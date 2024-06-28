<?php
header('Content-Type: text/html; charset=UTF-8');
header('Content-Type: application/json; charset=UTF-8');

Class loginController extends model{
    private $dados;

    public function __construct() {
        parent::__construct();
        $this->dados = array();
    }

    public function login(){
        try {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (!isset($dados['usuario']) || empty($dados['usuario'])) {
                output_header(false, 'Usuário não preenchido!');
                return;
            }
            $usuario = $dados['usuario'];

            
            if (!isset($dados['senha']) || empty($dados['senha'])) {
                output_header(false, 'Senha não preenchida!');
                return;
            }
            $senha = $dados['senha'];

            $login = new Login();
            $retorno = $login->logar($usuario, $senha);
            if($retorno != 0){
                output_header(true,'Logado com sucesso!', $retorno);
            }else{
                output_header(false,'Erro ao logar, verifique as credenciais!');
            }

        } catch (PDOException $excecao) {
            output_header("Erro ao conectar com o banco de dados: ". $excecao->getMessage());
         }
    }

}
?>