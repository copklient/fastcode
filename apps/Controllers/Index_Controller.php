<?php 

class Index_Controller extends core\Controller{
	function __construct(){
	}
	function index($args, $data){
		require_once 'apps/views/index/index.php';
	}
	
}

 ?>