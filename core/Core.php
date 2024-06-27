<?php
class Core{

	public function exec(){
		$router = new Router();

		//configurar as rotas - Agrotóxicos
		//$router->addRoute('/', array(new homeController(), 'index'));
		$router->addRoute('/agrotoxicos', array(new agrotoxicosController(), 'index')); // Retorna todos os agrotóxicos
		$router->addRoute('/agrotoxicos/get', array(new agrotoxicosController(), 'get')); // Retorna um agrotóxico pelo ID
		$router->addRoute('/agrotoxicos/search', array(new agrotoxicosController(), 'getnome')); // Retorna um agrotóxico pelo ID
		$router->addRoute('/agrotoxicos/create', array(new agrotoxicosController(), 'create')); // Cria um novo agrotóxico
		$router->addRoute('/agrotoxicos/update', array(new agrotoxicosController(), 'update')); // Atualiza um agrotóxico pelo ID
		$router->addRoute('/agrotoxicos/delete', array(new agrotoxicosController(), 'delete')); // Deleta um agrotóxico pelo ID
		$router->addRoute('/404', array(new notfoundController(), 'index')); // pagina não encontrada
		
		//Usuários
		$router->addRoute('/agrotoxicos/cadastrar', array(new cadastroController(), 'cadastrar')); // Cadastro de usuário
		$router->addRoute('/agrotoxicos/login', array(new loginController(), 'login')); // Login do usuário
		
		//lidando com a requisição
		$route = isset($_GET['route'])?'/'.$_GET['route']:'/';

		$router->handleRequest($route);
	}

}
