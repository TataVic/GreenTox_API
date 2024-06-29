<?php

header('Content-Type: text/html; charset=UTF-8');
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
	
	public function get() {
        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            output_header(false, 'Parâmetros não enviados');
            return;
        }
    
        $agrotoxicos = new Agrotoxicos();
        $retorno = $agrotoxicos->getid($id);

        if(empty($retorno)) {
            output_header(false, 'Nenhum registro encontrado para o parâmetro informado');
        } else {
            output_header(true, 'Registro encontrado', $retorno);
        }
    }
	
	//Função de Pesquisar por nome os registros
	public function getnome() {
		$agrotoxicos = new Agrotoxicos;

		$nome = $_GET['nome'];
		$retorno = $agrotoxicos->getnome($nome);

		if(count($retorno) == 0){
			output_header(false, 'Nenhum registro cadastrado');
		} else {
			output_header(true, 'Consulta realizada', $retorno);
		}
	}
		
	//Função de Criar registros
	public function create() { 
	
		$dados = json_decode(file_get_contents('php://input'), true); //decodifica o json

		 // Verifique se a decodificação foi bem-sucedida
		 if (json_last_error() !== JSON_ERROR_NONE) {
			output_header(false, "Erro ao decodificar JSON: " . json_last_error_msg());
			return;
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST'){

			$nome = $dados['nome'] ?? '';
			$tipo = $dados['tipo'] ?? '';
			$fabricante = $dados['fabricante'] ?? '';
			$registro_anvisa = $dados['registro_anvisa'] ?? '';
			$categoria = $dados['categoria'] ?? '';
			$classe = $dados['classe'] ?? '';
			$preco = $dados['preco'] ?? '';
			$qtd_estoque = $dados['qtd_estoque'] ?? '';
			$precaucoes = $dados['precaucoes'] ?? '';
			$modo_uso = $dados['modo_uso'] ?? '';
	
			if (empty($nome) || empty($tipo) || empty($fabricante) || empty($registro_anvisa) ||
				empty($categoria) || empty($classe) || empty($preco) || empty($qtd_estoque) ||
				empty($precaucoes) || empty($modo_uso)) {
				output_header(false, "Informe todos os dados, em todos os campos!");
				return;
			}
			try {
				$agrotoxicos = new agrotoxicos();
				$retorno = $agrotoxicos->create($nome, $tipo, $fabricante, $registro_anvisa, $categoria, $classe, $preco, $qtd_estoque, $precaucoes, $modo_uso);
				output_header(true, "Produto agrotóxico cadastrado com sucesso!", $dados);
				
			} catch (Exception $excecao) {
				output_header(false, "Erro no cadastro do agrotóxico: " . $excecao->getMessage());
			}
		}else{
			output_header('Dados vazios ou método diferente de cadastrar, volte e preencha-os!');
			return;
		}
	}
	
	public function update() {
		$dados = json_decode(file_get_contents('php://input'), true);
	
		if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
			$id = $dados['id'] ?? null;
			$nome = $dados['nome'] ?? '';
			$tipo = $dados['tipo'] ?? '';
			$fabricante = $dados['fabricante'] ?? '';
			$registro_anvisa = $dados['registro_anvisa'] ?? '';
			$categoria = $dados['categoria'] ?? '';
			$classe = $dados['classe'] ?? '';
			$preco = $dados['preco'] ?? '';
			$qtd_estoque = $dados['qtd_estoque'] ?? '';
			$precaucoes = $dados['precaucoes'] ?? '';
			$modo_uso = $dados['modo_uso'] ?? '';
	
			if (!$id) {
				output_header(false, "ID do agrotóxico não fornecido.");
				return;
			}
	
			try {
				$agrotoxicos = new agrotoxicos();
				$retorno = $agrotoxicos->update($id, $nome, $tipo, $fabricante, $registro_anvisa, $categoria, $classe, $preco, $qtd_estoque, $precaucoes, $modo_uso);
				if ($retorno > 0) {
					output_header(true, "Registro atualizado com sucesso.", $retorno);
				} else {
					output_header(false, "Nenhuma alteração foi realizada.");
				}
			} catch (Exception $excecao) {
				output_header(false, "Erro na atualização do agrotóxico: " . $excecao->getMessage());
			}
		} else {
			output_header('Erro ao chamar o método PUT - atualizar agrotóxico!');
			return;
		}
	}


	public function delete() {
		$id = $_GET['id'];
		$agrotoxicos = new Agrotoxicos();
		$agrotoxicoExistente = $agrotoxicos->getid($id);
	
		if (empty($agrotoxicoExistente)) {
			output_header(false,'Agrotóxico não encontrado', $id);
			return;
		}
		$deletado = $agrotoxicos->delete($id);
	
		if ($deletado > 0) {
			output_header(true,'Agrotóxico deletado com sucesso', $deletado );
		} else {
			output_header(false,'Erro ao deletar o agrotóxico',$deletado );
		}
	}
}