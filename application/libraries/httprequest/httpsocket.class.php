<?php

  class HTTPSocketConnectionException extends Exception {}

  class HTTPSocket
  {
    // Define class constants
    const HTTPSOCKET_BUFFER = 4096; // 4KB
    const HTTPSOCKET_REGULAR_PORT = 80;
    const HTTPSOCKET_SSL_PORT = 443;
  
    // Private variable scope
    private $httpsocket_stream = null;
    private $httpsocket_data = null;
    private $httpsocket_host = null;
    private $httpsocket_port = null;
    private $httpsocket_status = null;
    
    public function __construct($host = null, $port = self::HTTPSOCKET_REGULAR_PORT, $data = null, $auto_connect = false)
    {
      $this->SetHost($host);
      $this->SetPort($port);
      if($data !== null) $this->SetData($data);
      
      if($auto_connect) $this->Connect();
    }
        
    public function SetHost($host)
    {
      $this->httpsocket_host = $host;
    }
    public function GetHost()
    {
      return $this->httpsocket_host;
    }
    
    public function SetPort($port)
    {
      $this->httpsocket_port = (($port == self::HTTPSOCKET_SSL_PORT) ? self::HTTPSOCKET_SSL_PORT : $port);
    }
    public function GetPort()
    {
      return $this->httpsocket_port;
    }
    
    public function SetData($data)
    {
      $this->httpsocket_data = $data;
    }
    public function GetData()
    {
      return $this->httpsocket_data;
    }
    
    public function Connect()
    {
      // Change socket if set to ssl
      $host = (($this->GetPort() == self::HTTPSOCKET_SSL_PORT) ? "ssl://" : null) . $this->GetHost();
      
      // Try to establish a connection
      if($sock = @fsockopen($host, $this->GetPort(), $error_num, $error_str, 5))
      {
        // Flag connection as established
        $this->IsConnected(true);
        $this->httpsocket_stream = $sock;
      }
      else
      {
        // Connection falied. Throw exception.
        throw new HTTPSocketConnectionException
        (
          "Unable to resolve host. Host either unavailable, removed or mistyped." . (empty($error_str) ? null : " {$error_str}({$error_num}).")
        );
      }
    }
    
    public function ReadData()
    {
      // Return false if no connection established
      if(!$this->IsConnected()) return false;
      
      // Init vars
      $data = null;
      
      // Read data from stream
      while(!feof($this->httpsocket_stream))
        $data .= fgets($this->httpsocket_stream, self::HTTPSOCKET_BUFFER);
      
      // Return data
      return $data;
    }
    
    public function WriteData()
    {
      if($this->IsConnected())
      {
        // Return status of write
        return (@fwrite($this->httpsocket_stream, $this->GetData()) === false ? false : true);
      }
    }
    
    public function ReadWriteData()
    {
      $this->WriteData();
      return $this->ReadData();
    }
    
    public function Close()
    {
      $this->IsConnected(false);
      @fclose($this->httpsocket_stream);
    }
    
    public function IsConnected($status = null)
    {
      if($status == null)
        $status = $this->httpsocket_status;
      else
        $this->httpsocket_status = $status = (bool) $status;
      
      return $status;
    }
  }
  
?>