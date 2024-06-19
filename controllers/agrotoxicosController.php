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
	
	public function get(){
		//$api = new Api();
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$id = $_GET['id'];
		}else{
			output_header(false,'parametros não enviados');
		}
		$agrotoxicos = new Agrotoxicos();
		$retorno = $agrotoxicos->getid($id);

		if(!isset($retorno['id']) || empty($retorno['id'])){
			output_header(false,'Nenhum registro encontrado para o parametro informado');
		}

		output_header(true,'Consulta Realizada', $retorno);
	}
	
		public function create() {
			// Lógica para criar um novo agrotóxico
		}
	
		public function update() {
		
		}

		public function getnome() {
			$agrotoxicos = new Agrotoxicos;

			$nome = $_GET['nome'];
			$retorno = $agrotoxicos->getnome($nome);
	
			if(count($retorno) == 0){
				output_header(false, 'Nenhum tipo cadastrado');
			} else {
				output_header(true, 'Consulta realizada', $retorno);
			}
		}
			
		public function delete() {
		
			$id = $_GET['id'];
			$agrotoxicos = new Agrotoxicos();
			$agrotoxicoExistente = $agrotoxicos->getid($id);
		
			if (empty($agrotoxicoExistente)) {
				echo json_encode(['error' => 'Agrotóxico não encontrado']);
				return;
			}
			$deletado = $agrotoxicos->delete($id);
		
			if ($deletado) {
				echo json_encode(['success' => 'Agrotóxico deletado com sucesso']);
			} else {
				echo json_encode(['error' => 'Erro ao deletar o agrotóxico']);
			}
		}

		
	}
	





		
	
	
	














