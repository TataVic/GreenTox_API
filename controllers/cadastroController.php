<?php
header('Content-Type: application/json; charset=UTF-8');

class cadastroController extends Controller {
    private $dados;

    public function __construct() {
        parent::__construct();
        $this->dados = array();
    }

    public function cadastrar() {
        try {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (!isset($dados['nome']) || empty($dados['nome'])) {
                output_header(false, 'Nome não preenchido!');
                return;
            }
            $nome = $dados['nome'];

            if (!isset($dados['usuario']) || empty($dados['usuario'])) {
                output_header(false, 'Usuário não preenchido!');
                return;
            }
            $usuario = $dados['usuario'];


            if (!isset($dados['email']) || empty($dados['email'])) {
                output_header(false, 'Email não preenchido!');
                return;
            }
            $email = $dados['email'];
            
            if (!isset($dados['senha']) || empty($dados['senha'])) {
                output_header(false, 'Senha não preenchida!');
                return;
            }
            $senha = $dados['senha'];

            // Gerar token (exemplo simples)
            $token = bin2hex(random_bytes(16));
            

            $cadastro = new Cadastro();
            $retorno = $cadastro->cadastrar($nome, $usuario, $email,  $senha, $token);

           retorna_cadastro('OK', $retorno);

        } catch (PDOException $excecao) {
           retorna_cadastro("Erro ao conectar com o banco de dados: ". $excecao->getMessage());
        }
    }
}
?>
