<?php
class Core{

	public function exec(){
		$router = new Router();

		//configurar as rotas
		$router->addRoute('/', array(new homeController(), 'index'));
		$router->addRoute('/agrotoxicos', array(new agrotoxicosController(), 'index'));
		$router->addRoute('/404', array(new notfoundController(), 'index'));

		//lidando com a requisição
		$route = isset($_GET['route'])?'/'.$_GET['route']:'/';

		$router->handleRequest($route);
	}

}
