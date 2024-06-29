<?php
class Login extends Model {
    public function logar($usuario, $senha) {
        try {
            // Prepara a consulta SQL para buscar o usuário pelo nome
            $sql = $this->db->prepare("SELECT * FROM tab_usuario WHERE usuario = :usuario");
            $sql->bindParam(":usuario", $usuario);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $usuario = $sql->fetch(\PDO::FETCH_ASSOC);

        
                if ($senha === $usuario['senha']) {
                  return $usuario['token'];
                } else {
                    error_log("Senha incorreta para o usuário: " . $usuario['usuario']);
                    return false;
                }
            } else {
                // Usuário não encontrado (debug)
                error_log("Usuário não encontrado para o nome de usuário: " . $usuario);
                return false;
            }
        } catch (PDOException $e) {
            error_log("Erro ao tentar logar: " . $e->getMessage());
            return false;
        }
    }
}
?>
