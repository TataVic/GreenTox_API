<?php
	header('Content-Type: text/html; charset=UTF-8'); //Para Caracteres especiais
class agrotoxicos extends model{

	//função de criar um novo registro (CREATE)
	public function create($nome, $tipo, $fabricante, $registro_anvisa, $categoria, $classe, $preco, $qtd_estoque, $precaucoes, $modo_uso) { 
		try {
			$sql = "INSERT INTO tab_agrotox (nome, tipo, fabricante, registro_anvisa, categoria, classe, preco, qtd_estoque, precaucoes, modo_uso) 
					VALUES (:nome, :tipo, :fabricante, :registro_anvisa, :categoria, :classe, :preco, :qtd_estoque, :precaucoes, :modo_uso)";
			$sql = $this->db->prepare($sql);
			$sql->bindParam(':nome', $nome);
			$sql->bindParam(':tipo', $tipo);
			$sql->bindParam(':fabricante', $fabricante);
			$sql->bindParam(':registro_anvisa', $registro_anvisa);
			$sql->bindParam(':categoria', $categoria);
			$sql->bindParam(':classe', $classe);
			$sql->bindParam(':preco', $preco);
			$sql->bindParam(':qtd_estoque', $qtd_estoque);
			$sql->bindParam(':precaucoes', $precaucoes);
			$sql->bindParam(':modo_uso', $modo_uso);
			$sql->execute();
	
			return $this->db->lastInsertId(); // Retorna o ID do novo registro inserido
			return [
				'nome' => $nome,
				'tipo' => $tipo,
				'fabricante' => $fabricante,
				'registro_anvisa' => $registro_anvisa,
				'categoria' => $categoria,
				'classe' => $classe,
				'preco' => $preco,
				'qtd_estoque' => $qtd_estoque,
				'precaucoes' => $precaucoes,
				'modo_uso' => $modo_uso
			];
		} catch (PDOException $excecao) {
			throw new Exception("Erro ao criar um novo agrotóxico: " . $excecao->getMessage());
		}
	}

	// Função de listar todos os agrotoxicos cadastrados (READ)
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
	
	// Função de pesquisar por id (READ)
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

   // Pesquisa pelo nome (rota search)
	public function getnome($nome) {
        $retorno = array();
        $sql = "SELECT id,nome, tipo, fabricante, registro_anvisa, categoria, classe, preco, qtd_estoque, precaucoes, modo_uso 
                FROM tab_agrotox 
                WHERE nome LIKE :nome";
        
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':nome', '%' . $nome . '%');
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $retorno = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $retorno;
    }
	
// Função de Atualizar registros (UPDATE)
public function update($id, $nome, $tipo, $fabricante, $registro_anvisa, $categoria, $classe, $preco, $qtd_estoque, $precaucoes, $modo_uso) {
    try {
        $sql = "UPDATE tab_agrotox SET 
                    nome = :nome, 
                    tipo = :tipo, 
                    fabricante = :fabricante, 
                    registro_anvisa = :registro_anvisa, 
                    categoria = :categoria, 
                    classe = :classe, 
                    preco = :preco, 
                    qtd_estoque = :qtd_estoque, 
                    precaucoes = :precaucoes, 
                    modo_uso = :modo_uso 
                WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindParam(':id', $id);
			$sql->bindParam(':nome', $nome);
			$sql->bindParam(':tipo', $tipo);
			$sql->bindParam(':fabricante', $fabricante);
			$sql->bindParam(':registro_anvisa', $registro_anvisa);
			$sql->bindParam(':categoria', $categoria);
			$sql->bindParam(':classe', $classe);
			$sql->bindParam(':preco', $preco);
			$sql->bindParam(':qtd_estoque', $qtd_estoque);
			$sql->bindParam(':precaucoes', $precaucoes);
			$sql->bindParam(':modo_uso', $modo_uso);
			$sql->execute();

        return $sql->rowCount() > 0;
    } catch (PDOException $excecao) {
        throw new Exception("Erro ao atualizar agrotóxico: " . $excecao->getMessage());
    }
}


	// Função de deletar por id (DELETE)
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

}