<?php

  abstract class HTTPPackageFilter
  {
    protected $httppackagefilter_next = null;
    
    public function SetNext($filter)
    {
      $this->httppackagefilter_next = $filter;
    }
    public function GetNext()
    {
      return $this->httppackagefilter_next;
    }
    
    // Method sheet
    public function Run($source)
    {
      // Set next
      $next = $this->GetNext();
      
      // Perform filtering
    
      // Return filtered data, or pass to next.
      return ($next == null ? $source : $next->Run($source));
    }
  }
  
  class HTTPFilterHandler
  {
    protected $httpfilterhandler_stack = null;
    protected $httpfilterhandler_pointer = null;
    
    public function AddFilter(HTTPPackageFilter $filter)
    {
      // Init vars
      $previous = $this->httpfilterhandler_pointer;
      
      // Pass instance onto previous(if set). Keep building chain.
      if($previous !== null) $previous->SetNext($filter);
      $this->httpfilterhandler_pointer = $filter;
      
      // Append filter to stack
      $this->httpfilterhandler_stack[] = $filter;
    }
    
    public function __construct()
    {
      // Init class vars
      $this->httpfilterhandler_stack = array();
    
      // Add filters to stack
      foreach(func_get_args() as $filter) $this->AddFilter($filter);
    }
  
    public function Run($source)
    {
      // Check whether any filters are added
      if(count($this->httpfilterhandler_stack) == 0) return $source;
    
      // Run dirty source through filters
      return $this->httpfilterhandler_stack[0]->Run($source);
    }
  }
  
  // GZIP filter exceptions
  class HTTPGZIPFilterException extends Exception {}
  
  class HTTPGZIPFilter extends HTTPPackageFilter
  {
    public function Run($source)
    {
      // Set next
      $next = $this->GetNext();
      
      // Detect GZIP encoded package
      if(@$source->header['data']['content-encoding'] == "gzip")
      {
        // Try to decompress gzip deflated package, throw exception on faliure
        if(($uncompressed = @gzinflate(substr($source->content, 10))) === false)
          throw new HTTPGZIPFilterException("Could not decompress GZIP-encoded package.");
        else
          $source->content = $uncompressed;
      }
      
      // Return filtered data, or pass to next.
      return ($next == null ? $source : $next->Run($source));
    }
  }
  
  // Chunk filter exceptions
  class HTTPChunkFilterException extends Exception {}
  
  class HTTPChunkFilter extends HTTPPackageFilter
  {
    const HTTP_CHUNK_SEPERATOR = "\r\n";
    
    public function Run($source)
    {
      // Set next
      $next = $this->GetNext();
      
      // Detect GZIP encoded package
      if((@$source->header['data']['transfer-encoding'] == "chunked"))
      {
        // Init vars
        $data = $source->content;
        $data_buffer = null;
        $size = 1;
        
        // Loop-through data until all chunks are extracted
        while($size > 0)
        {        
          // Locate offset and perform minor error handling
          if(($offset = strpos($data, self::HTTP_CHUNK_SEPERATOR)) === false)
            throw new HTTPChunkFilterException("Could not find a valid offset.");
          
          // Extract chunk size in hex, then convert to dec
          $size = hexdec(substr($data, 0, $offset));
          
          // Extract, reduct and build data + buffer
          $data_buffer .= substr($data, ($offset+2), $size);
          $data = ltrim(substr($data, ($size+$offset+2)));
        }
        
        // Assign filtered data to source
        $source->content = $data_buffer;
      }
      
      // Return filtered data, or pass to next.
      return ($next == null ? $source : $next->Run($source));
    }
  }
  
  class HTTPBasicAuth extends HTTPPackageFilter
  {
    private $httpbasicauth_username = null;
    private $httpbasicauth_password = null;
  
    // Basic constructor
    public function __construct($username, $password)
    {
      $this->httpbasicauth_username = $username;
      $this->httpbasicauth_password = $password;
    }
  
    // Method sheet
    public function Run($source)
    {
      // Set next
      $next = $this->GetNext();
      
      // Include authorization in header
      $source->SetHeader
      (
        "Authorization",
        "Basic " . base64_encode("{$this->httpbasicauth_username}:{$this->httpbasicauth_password}")
      );
    
      // Return filtered data, or pass to next.
      return ($next == null ? $source : $next->Run($source));
    }
  }

?>