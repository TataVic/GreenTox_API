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
	
		public function get($id) {
			// Lógica para retornar um agrotóxico pelo ID
		}
	
		public function create() {
			// Lógica para criar um novo agrotóxico
		}
	
		public function update($id) {
			// Lógica para atualizar um agrotóxico pelo ID
		}
	
		public function delete($id) {
			// Lógica para deletar um agrotóxico pelo ID
		}
	}
	














