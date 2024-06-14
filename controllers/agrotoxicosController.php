<?php
class agrotoxicosController extends controller{

	private $dados;

	public function __construct(){
		parent::__construct();
		$this->dados = array();
	}

	public function index(){

		//$api = new Api(); // quando tiveer o token instanciar

		$agrotoxicos = new Agrotoxicos();
		$lista = $agrotoxicos->getAll();

		output_header(true,'todos os produtos',$lista);
	}

}
