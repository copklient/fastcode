<?php 

namespace core;

class Bootstrap extends System{
	public $apps;
	public $url;
	public $app;
	public $error;
	public $controller;
	public $model;

	function __construct(){
		$this->render();
	}

	function render(){
		$apps = scandir('apps/Views/');
		if($apps[0] == '.')
		    unset($apps[0]);
		if($apps[1] == '..')
			unset($apps[1]);
		if($apps[2] == '404.php')
			unset($apps[2]);
		$this->apps = array_filter(array_merge(array(0), $apps));

		$this->url = trim(urldecode(preg_replace('/\?.*/iu', '', URL)), '/');
		if($this->url == ''){
			$this->url = 'index';
		}

		$this->app = false;

		$this->AppFind();

		$this->ControllerAndModelFind();

	}

	function AppFind(){

		foreach ($this->apps as $pattern) {
			if($pattern == $this->url){
				$args = array();
				$data = array();
				$this->app = array(
					'pattern' => $pattern,
					'args' => $args,
					'data' => $data
					);
				break;
			}
			
		}

		if($this->app == false){
			require_once('apps/views/404.php');
			exit;
		}

	}

	function ControllerAndModelFind(){

		if ( $this->app  && is_array($this->app)){
			if(file_exists('apps/Models/'.$this->app['pattern'].'_Model.php')){
				$app_model = $this->app['pattern'].'_Model';
				require_once 'apps/Models/'.$this->app['pattern'].'_Model.php';
				$this->model = new $app_model;	
				$this->app['data'] = $this->model->{$this->app['pattern']}($this->app['data']);
			}
			else
				$this->error = '<h2 style="display:inline;color:red">'.$this->app['pattern'].'</h2>: Model not found!';
			if(file_exists('apps/Controllers/'.$this->app['pattern'].'_Controller.php')){
				$app_controller = $this->app['pattern'].'_Controller';
				require_once 'apps/Controllers/'.$this->app['pattern'].'_Controller.php';
				$this->controller = new $app_controller;
			}
			else
				$this->error = '<h2 style="display:inline;color:red">'.$this->app['pattern'].'</h2>: Controller not found!';
			if(!empty($_GET)){
				$txt = $_SERVER['argv'];
				$arr = explode('&', $txt[0]);
				foreach ($arr as $val) {
				    $tmp = explode('=', $val);
				    $this->app['args'][$tmp[0]] = $tmp[1];
				}				
			}
			if($this->controller != '')
				$this->controller->{$this->app['pattern']}($this->app['args'], $this->app['data']);

		}

	}
	
}

 ?>