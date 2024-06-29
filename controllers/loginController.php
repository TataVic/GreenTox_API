<?php
header('Content-Type: application/json; charset=UTF-8');

class LoginController extends Controller {
    private $dados;

    public function __construct() {
        parent::__construct();
        $this->dados = array();
    }

    public function login() {
        try {
            // Recebe os dados de login via POST (formato JSON)
            $dados = json_decode(file_get_contents('php://input'), true);

            // Verifica se os campos obrigatórios estão preenchidos
            if (!isset($dados['usuario']) || empty($dados['usuario'])) {
                $this->output_header(false, 'Usuário não preenchido!');
                return;
            }

            if (!isset($dados['senha']) || empty($dados['senha'])) {
                $this->output_header(false, 'Senha não preenchida!');
                return;
            }

            // Extrai usuário e senha
            $usuario = $dados['usuario'];
            $senha = $dados['senha'];

            // Instancia o model de Login
            $loginModel = new Login();

            // Chama o método para tentar autenticar
            $token = $loginModel->logar($usuario, $senha);

            // Verifica se o token foi retornado com sucesso
            if ($token) {
                // Inicia a sessão e armazena o token
                session_start();
                $_SESSION['token'] = $token;

                $this->retorna_cadastro('OK', ['token' => $token]);
            } else {
                $this->retorna_cadastro('Erro ao logar', []);
            }

        } catch (PDOException $excecao) {
            $this->retorna_cadastro("Erro ao conectar com o banco de dados: " . $excecao->getMessage());
        }
    }

    // Função para retornar resposta JSON
    private function output_header($status, $message) {
        echo json_encode([
            'status' => $status,
            'message' => $message
        ]);
    }

    // Função para retornar dados em formato JSON
    private function retorna_cadastro($status, $dados) {
        echo json_encode([
            'status' => $status,
            'dados' => $dados
        ]);
    }
}
?>
