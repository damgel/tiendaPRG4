<?php

  require_once("src/facebook.php");

  $config = array(
      'appId' => '621408251248602',
      'secret' => 'ce0286e45546ad72d2e163e9cb570d08',
      'fileUpload' => false // optional
  );

  $facebook = new Facebook($config);
  
  $params = array(

  'redirect_uri' => 'https:// A QUI VA LA DIRECCION DEL PROYECTO'
);

$loginUrl = $facebook->getLoginUrl($params);
  
  ?>
   
    <a href="redirect_uri"><img src="Images"></a> <br />
	
