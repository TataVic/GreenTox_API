<?php
class agrotoxicosController extends controller{

	private $dados;

	public function __construct(){
		parent::__construct();
		$this->dados = array();
	}

	public function index(){

		//$api = new Api();

		$agrotoxicos = new Agrotoxicos();
		$lista = $agrotoxicos->getAll();

		output_header(true,'todos os produtos',$lista);
	}

}
