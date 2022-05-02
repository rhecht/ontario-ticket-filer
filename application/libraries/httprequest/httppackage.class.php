<?php

  class HTTPPackage extends HTTPPackageBuilder
  {  
    public function __construct($url, $data = null, $method = self::HTTP_GET_METHOD)
    {
      $this->httppackage_header = array();
      parent::__construct($url, $data, $method);
    }

    public function Parse($data = null)
    {
      // Initialize new parser.
      $parser = new HTTPPackageParser();
      
      // Run data through parser, and return.
      return $parser->Parse(($data == null ? $this->GetData : $data));
    }
  }

  class HTTPPackageBuilder
  { 
    const HTTP_SEPERATOR = "\r\n";
    const HTTP_DOUBLE_SEPERATOR = "\r\n\r\n";
    const HTTP_PROTOCOL_VERSION = "HTTP/1.1";
    const HTTP_GET_METHOD = "GET";
    const HTTP_POST_METHOD = "POST";
  
    protected $httppackage_url = null;
    protected $httppackage_method = null;
    protected $httppackage_data = null;
    protected $httppackage_header = null;
  
    public function __construct($url, $data = null, $method = self::HTTP_GET_METHOD)
    {
      // Set 
      $this->SetUrl($url);
      $this->SetMethod($method);
      $this->SetData($data);

      // Set connection header
      $this->SetHeader("Connection", "close");
    }
    
    public function SetMethod($method = self::HTTP_GET_METHOD)
    {
      if($method == self::HTTP_POST_METHOD)
      {
        $this->SetHeader('Content-Type', 'application/x-www-form-urlencoded');
      }
      else
      {
        $method = self::HTTP_GET_METHOD;
        $this->SetHeader('Content-Type', 'text/html');
      }
      
      $this->httpackage_method = $method;
    }
    public function GetMethod()
    {
      return $this->httpackage_method;
    }
    
    public function SetHeader($key, $var)
    {
      $this->httppackage_header[$key] = $var;
    }
    public function GetHeader($key)
    {
      return @$this->httppackage_header[$key];
    }
    public function RemoveHeader($key)
    {
      unset($this->httppackage_header[$key]);
    }
    
    public function SetData($data)
    {
      if(is_array($data) && $this->GetMethod() == self::HTTP_POST_METHOD)
        $data = http_build_query($data);

      $this->httppackage_data = $data;
    }
    public function GetData()
    {
      return $this->httppackage_data;
    }
    
    public function SetUrl($url)
    {
      // Perform minor url correction(if neccessary) and parse url
      //$url = parse_url((strpos($url, "://") === false ? "http://{$url}" : $url));
	  $url = parse_url((strpos($url, "://") === false ? "http://" . $url  : $url));
      
      // Set url defaults if they have been left out
      if(!isset($url['scheme'])) $url['scheme'] = 'http';
      if(!isset($url['path'])) $url['path'] = '/';
      
      // Correct parsed url further
      if(!isset($url['host']))
      {
        // If host couldent be parsed, this must mean that there is no
        // seperation between host and path. ex www.test.com(path left out).
        $url['host'] = str_replace("/", "", $url['path']);
        $url['path'] = '/';
      }
      
      // Update host header
      $this->SetHeader("Host", $url['host']);
      
      // Store parsed url
      $this->httppackage_url = $url;
    }
    
    public function GetUrl($component)
    {
      return $this->httppackage_url[$component];
    }
    
    public function BuildHeader()
    {
      // Set url, append query if available
      $query = @$this->getUrl("query");
      $url = $this->GetUrl("path") . ($query == null ? null : "?{$query}");
      
      // Set data length
      if(($length = strlen($this->GetData())) > 0) $this->SetHeader("Content-Length", $length);
      
      // Sort and build header
      arsort($this->httppackage_header);
      $header = $this->GetMethod() . " {$url} " . self::HTTP_PROTOCOL_VERSION . self::HTTP_SEPERATOR;
      $header .= $this->KeyImplode(": ", self::HTTP_SEPERATOR, $this->httppackage_header);
      
      // Return generated header
      return $header . self::HTTP_DOUBLE_SEPERATOR;
    }
    
    public function Build()
    {
      return $this->BuildHeader() . $this->GetData();
    }
    
    private function KeyImplode($key_seperator, $row_seperator, $array)
    {
      // Initialize empty array
      $key_seperated_array = array();

      // Loop-through and merge keys and values with delimiter
      foreach($array as $key => $value) $key_seperated_array[] = $key . $key_seperator . $value; 

      // Imploded array with row seperator, then return
      return implode($row_seperator, $key_seperated_array); 
    }
    
    public function __toString()
    {
      return $this->Build();
    }
  }
  
  class HTTPPackageParserException extends Exception {}
  
  class HTTPPackageParser
  {
    const HTTP_SEPERATOR = "\r\n";
    const HTTP_ALTERNATIVE_SEPERATOR = "\n";
    
    private $httppackageparser_seperator = null;
    
    public function __construct()
    {
      $this->SetSeperator(self::HTTP_SEPERATOR);
    }
    
    private function SetSeperator($seperator)
    {
      $this->httppackageparser_seperator = $seperator;
    }
    private function GetSeperator()
    {
      return $this->httppackageparser_seperator;
    }
    
    private function SeperateData($data)
    {
      // Identify seperator. Some servers actually use \n instead of the RFC compliant \r\n.
      $this->SetSeperator(strpos($data, $this->GetSeperator()) === false ? self::HTTP_ALTERNATIVE_SEPERATOR : self::HTTP_SEPERATOR);
    
      // Seperate and combine array with assoc keys
      $seperated = @array_combine(array("header", "body"), explode(str_repeat($this->GetSeperator(), 2), $data, 2));
      
      // Return seperated data
      return $seperated;
    }
    
    private function ParseHeader($raw_header)
    {
      // Init vars
      $parsed_header = array();
      $raw_header = explode($this->GetSeperator(), $raw_header);
      
      // Extract response status from header and perform minor error handling
      if(($status_header = @array_combine(array("protocol", "code", "message"), explode(" ", $raw_header[0], 3))) === false)
        throw new HTTPPackageParserException('Unable to parse header. Header response status incorrect or not well formated.');
      
      // Remove status head from header flow
      unset($raw_header[0]);
      
      // Loop-through and parse header vars
      foreach($raw_header as $header)
      {
        // Validate header
        if(strpos($header, ": ") === false)
        {
          throw new HTTPPackageParserException('Unable to parse header variable. Variable not correctly formatted.');
        }
        else
        {
          // Extract key and value
          list($key, $value) = explode(": ", $header, 2);
  
          // Convert key to lowercase
          $key = strtolower($key);
          
          // Check whether we should set or append data to key(append data if key is already set).
          @$parsed_header[$key] = (($parsed_header[$key] == null) ? $value : array_merge((array) $parsed_header[$key], (array) $value));
        }
      }
      
      // Append statuscode to and return parsed results
      return array("status" => $status_header, "data" => $parsed_header);
    }
    
    public function Parse($data)
    {
      // Init vars
      $package = (object) null;
      
      // Seperate header from body, and append parsed data to object
      $content = $this->SeperateData($data);
      $package->header = $this->ParseHeader($content['header']);
      $package->content = $content['body'];
      
      // Return parsed
      return $package;
    }
    
    public function __toString()
    {
      return $this->Parse();
    }
  }
  
?>