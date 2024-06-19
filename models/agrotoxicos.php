<?php
class agrotoxicos extends model{

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
	public function delete($id) {
        $sql = "DELETE FROM tab_agrotox WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        
        try {
            $stmt->execute();
            return true; // Deleção bem-sucedida
        } catch (\PDOException $e) {
            // Aqui você pode logar o erro ou tratar de outra forma
            return false; // Erro ao deletar
        }
    }
	public function getnome($id) {
      // pesquisa por nome
    }

	


}