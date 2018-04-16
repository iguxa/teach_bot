<?php 
class Router 
{

	private $routes;

	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this -> routes = include ($routesPath);

	}
	//request uri
	private function getURI()
	{
				if(!empty($_SERVER['REQUEST_URI'])) {
				return trim($_SERVER['REQUEST_URI'], '/');
				}
	}

	public function run()
	{
		//print_r($this -> routes);
		//echo 'Class Router,method run';
		$uri = $this -> getURI();
		//var_dump($this ->routes) ;
		foreach ($this ->routes as $uriPattern => $path) {
			if (preg_match("~$uriPattern~", $uri)){
				
				//echo '<br> Где ищем( запрос ,который набрал пользовуатель):'.$uri;
				//echo '<br> Что ищем(сопоставление из правил):'.$uriPattern;
				//echo '<br> Кто обрабатывает:'.$path;
				//exit();

				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				//echo '<br>Нужно оформить'.$internalRoute;

			$segments = explode('/', $internalRoute);

			$controllerName = array_shift($segments).'Controller';
			$controllerName = ucfirst($controllerName);
			//var_dump($segments) ;
			//exit();


			$actionName = 'action'.ucfirst(array_shift($segments));
			//echo '<br>controller name: ' .$controllerName;
			//echo '<br>action name: '. $actionName;
			$parametrs = $segments;
			//echo '<pre>';
			//print_r($parametrs);
			//die;
			//exit();
			$controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
			
			if(file_exists($controllerFile)){
				include_once($controllerFile);
			}
			//print_r(file_exists($controllerFile));

			//exit();
			$controllerObject = new $controllerName;
			//echo $controllerObject;
			//exit();
			//$result = $controllerObject -> $actionName($parametrs);
			$result = call_user_func_array(array($controllerObject,$actionName), $parametrs);
			if ($result != null){
				break;
			}

		}
		}
		
	}


		

	
}