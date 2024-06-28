<?php
header('Content-Type: text/html; charset=UTF-8');
Class login extends model{
    public function isValidToken($token)
    {
         try {
             // Consulta para verificar se o usuário e a senha estão corretos
             $sql = $this->db->prepare("SELECT token FROM tab_usuario WHERE token = :token");
             $sql->bindParam(":token", $token);
             $sql->execute();

             if ($sql->rowCount() > 0) {             
                 return true;
             } else {
                 return false;
             }
         } catch (PDOException $e) {
             return "Token incorreto".$e->getMessage();
         }     
    }

    public function logar($usuario, $senha){
         try {
             // Consulta para verificar se o usuário e a senha estão corretos
             $sql =  $this->db->prepare("SELECT usuario,senha,token FROM tab_usuario WHERE usuario = :usuario AND senha = :senha");
             $sql->bindParam(":usuario", $usuario);
             $sql->bindParam(":senha", $senha);
             $sql->execute();

             if ($sql->rowCount() > 0) {
                 // Autenticação bem-sucedida, redireciona para a página principal
                 return $sql->fetchAll(\PDO::FETCH_ASSOC);
             } else {
                 return "Erro na autenticação do usuário";
             }
         } catch (PDOException $e) {
             return "Erro ao consultar o banco".$e->getMessage();
         }        
    }   
}