<?php
class agrotoxicos extends model{

    // Função de listar todos os agrotoxicos cadastrados
	public function getAll(){
		$array = array();

		$sql = "SELECT *
		          FROM tab_agrotox";

		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}	

		return $array;
	}
	
    // Função de buscar por id
	public function getid($id){
		$retorno = array();

		$sql = "SELECT *
		          FROM tab_agrotox
		         WHERE id = :id";
	
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$retorno = $sql->fetch(\PDO::FETCH_ASSOC);
		}		         

		return $retorno;
	}

    // Função de deletar por id
	public function delete($id) {
        $sql = "DELETE FROM tab_agrotox WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
    
        try {
            $stmt->execute();
            return true; 
        } catch (\PDOException $e) {
           
            return false; 
        }
    }

	// pesquisa por nome trazendo outros dados , pesquisa mais não corretamente
	public function getnome($nome) {
        $retorno = array();
        $sql = "SELECT id,nome, tipo, fabricante, registro_anvisa, categoria, classe, preco, qtd_estoque, precaucoes, modo_uso 
                FROM tab_agrotox 
                WHERE nome LIKE :nome";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', '%' . $nome . '%');
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            $retorno = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $retorno;
    }
}


	// public function update($id) {
	

	
	// }

