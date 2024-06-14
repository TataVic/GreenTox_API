<?php
class Core{

	public function exec(){
		$router = new Router();

		//configurar as rotas
		$router->addRoute('/', array(new homeController(), 'index'));
		$router->addRoute('/agrotoxicos', array(new agrotoxicosController(), 'index')); // Retorna todos os agrotóxicos
		$router->addRoute('/agrotoxicos/{id}', array(new agrotoxicosController(), 'get')); // Retorna um agrotóxico pelo ID
		$router->addRoute('/agrotoxico', array(new agrotoxicosController(), 'create')); // Cria um novo agrotóxico
		$router->addRoute('/agrotoxicos/{id}', array(new agrotoxicosController(), 'update')); // Atualiza um agrotóxico pelo ID
		$router->addRoute('/agrotoxicos/{id}', array(new agrotoxicosController(), 'delete')); // Deleta um agrotóxico pelo ID
		$router->addRoute('/404', array(new notfoundController(), 'index')); // pagina não encontrada
		//lidando com a requisição
		$route = isset($_GET['route'])?'/'.$_GET['route']:'/';

		$router->handleRequest($route);
	}

}
