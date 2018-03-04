<?php 

session_start();
require_once 'config/url.php';
require_once 'config/install.php';
require_once 'config.php';
require 'vendor/autoload.php';
$Bootstrap = new core\Bootstrap();
echo $Bootstrap->error;

 ?>