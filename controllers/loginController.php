<?php
header('Content-Type: text/html; charset=UTF-8');
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
            if($retorno > 0){
                retorna_cadastro('OK', $retorno);
            }else{
                retorna_cadastro('Erro ao logar', $retorno);
            }

        } catch (PDOException $excecao) {
            retorna_cadastro("Erro ao conectar com o banco de dados: ". $excecao->getMessage());
         }
    }

}
?>