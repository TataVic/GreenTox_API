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

}