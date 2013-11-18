<?php

  require_once("src/facebook.php");

  $config = array(
      'appId' => '621408251248602',
      'secret' => 'ce0286e45546ad72d2e163e9cb570d08',
      'fileUpload' => false // optional
  );

  $facebook = new Facebook($config);
 ?> 