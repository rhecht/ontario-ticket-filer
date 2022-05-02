<?php

  include_once("httpsocket.class.php");
  include_once("httppackage.class.php");
  include_once("httppackagefilter.class.php");

  /* Wrapper class for handling HTTPSocket, HTTPPackage and HTTPFilter(s). */
  class HTTPRequest
  {
    const HTTP_GET_METHOD = "GET";
    const HTTP_POST_METHOD = "POST";
    
    private $httprequest_socket = null;
    private $httprequest_package = null;
    private $httprequest_incoming_filter = null;
    private $httprequest_outgoing_filter = null;
    
    public function __construct($url, $data = null, $method = self::HTTP_GET_METHOD, $auto_connect = false, $force_port = null)
    {
      // Create new package
      $this->httprequest_package = $package = new HTTPPackage($url, $data, $method);
      
      // Provide user agent ;)
      $this->SetHeader("User-Agent", "httprequest_by_redemption.se");
      
      // Initialize neccessary filters
      $this->httprequest_incoming_filter = new HTTPFilterHandler(new HTTPChunkFilter(), new HTTPGZIPFilter());
      $this->httprequest_outgoing_filter = new HTTPFilterHandler(); // ex: new HTTPBasicAuth("my username", "my password")
      
      // Control which port the socket will attempt to connect to
      $socket_port = ($force_port == null ? ($package->GetUrl("scheme") == 'http' ?
        HTTPSocket::HTTPSOCKET_REGULAR_PORT : HTTPSocket::HTTPSOCKET_SSL_PORT) : (int) $force_port);
      
      // Utilize new socket
      $this->httprequest_socket = new HTTPSocket
      (
        $package->GetUrl("host"),
        $socket_port,
        null,
        $auto_connect
      );
    }

    public function SetHeader($key, $value)
    {
      $this->httprequest_package->SetHeader($key, $value);
    }

    public function GetHeader($key)
    {
      $this->httprequest_package->GetHeader($key);
    }
    
    public function Send()
    {
      // Run package through filters
      $this->httprequest_package = $this->httprequest_outgoing_filter->Run($this->httprequest_package);
    
      // Construct package
      $package = $this->httprequest_package->Build();

      // Assign data to socket
      $socket = $this->httprequest_socket;
      $socket->SetData($package);
      
      // Write data and return status
      return $socket->WriteData();
    }
    
    public function Recieve()
    {
      // Read data from socket
      $data = $this->httprequest_socket->ReadData();
      
      // Parse incoming data
      $data = (strlen($data) > 0 ? $this->httprequest_package->Parse($data) : false);
      
      // Run package through filter
      if(is_object($data)) $data = $this->httprequest_incoming_filter->Run($data);
      
      // Return parsed results, false on failiure.
      return $data;
    }
    
    public function SendRecieve()
    {
      // Init vars
      $result = false;
    
      // Send and recieve parsed data
      if($this->Send()) $result = $this->Recieve();
      
      // Return data on success, false on faliure.
      return $result;
    }
    
    public function Connect()
    {
      $this->httprequest_socket->Connect();
    }
    
    public function Close()
    {
      $this->httprequest_socket->Close();
    }
    
    public function __destruct()
    {
      @$this->Close();
    }
  }
  
?>