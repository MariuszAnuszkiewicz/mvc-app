<?php

class View{
	
	protected $data;
	protected $path;

	protected static function getDefaultViewPath(){
		
		$router = App::getRouter();

		if(!$router){
			
			return false;
		}
		$controller_dir = $router->getController();

        if($router->getMethodPrefix() == "admin"){

            $template_name = $router->getMethodPrefix() . "_" . $router->getAction() . '.php';

        }else {

            $template_name = $router->getMethodPrefix() . $router->getAction() . '.php';

        }
		return VIEWS_PATH.DS.$controller_dir.DS.$template_name;
	}
	
	public function __construct($data = array(), $path = null){
		
		if(!$path){
			
			$path = self::getDefaultViewPath();
			
		}
		if(!file_exists($path)){
			
			throw new Exception('Template file is not found in path: ' .$path);
			
		}
		
		$this->path = $path;
		$this->data = $data;

	}

	public function render(){
		
		$data = $this->data;
		
		ob_start();
		
		require_once "{$this->path}";
		
		ob_end_flush();

	}

} // end class
