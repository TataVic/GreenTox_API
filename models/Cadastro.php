<?php
header('Content-Type: application/json; charset=UTF-8');

class cadastro extends Model {

    public function cadastrar($nome, $usuario, $email, $senha, $token) {
        try {
            
             // Hash da senha para segurança
             $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

            $sql = $this->db->prepare("INSERT INTO tab_usuario (nome, usuario, email, senha, token) VALUES (:nome, :usuario, :email, :senha, :token)");
            $sql->bindParam(":nome", $nome);
            $sql->bindParam(":usuario", $usuario);
            $sql->bindParam(":email", $email);
            $sql->bindParam(":senha", $senhaHash);
            $sql->bindParam(":token", $token);

            // Executa a query
            if ($sql->execute()) {
                return "Usuário cadastrado com sucesso!";
            } else {
                return "Erro ao cadastrar o usuário.";
            }
        } catch (PDOException $excecao) {
            return "Erro ao conectar ao banco de dados: " . $excecao->getMessage();
        }
    }
}
?>
