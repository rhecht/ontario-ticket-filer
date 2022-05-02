<?php

  include_once("httprequest.class.php");
  
  try
  {
    // Perform request
    $request = new HTTPRequest("www.rafihecht.com", null, null, true);
    $data = $request->SendRecieve();
  }
  catch(HTTPSocketConnectionException $e)
  {
    // Handle exception, ex. retry or fallback server.
    $data = "<h1>Error connecting to server</h1><p>{$e->getMessage()}</p>";
  }
  catch(HTTPPackageParserException $e)
  {
    // Handle exception..
    $data = "<h1>Parsing error.</h1><p>{$e->getMessage()}</p>";
  }
  catch(Exception $e)
  {
    // Unknown exception
    $data = "<h1>".get_class($e)."</h1><p>{$e->getMessage()}</p>";
  }
  
  // Output
  //echo print_r($data);
  $mydata=(string)$data->content;
  echo $mydata;

?>