<?php
/**
 * Classe para salvar comentarios
 * @author 		Jonas Thomaz de Faria 	jonasthomaz@gmail.com
 * @version 	0.0.1
 */

class DbComments{

	private $db;

	/**
	 * Construtor da classe
	 * @param  	pdo 	Conexão PDO
	 */ 
	public function __construct($db) {
		$this->db = $db;
	}	

	public function get($objeto){
		$db = array();
		$query=$this->db->prepare("select * from dbcomments where objeto = :objeto");
		$query->bindParam(':objeto', $objeto);
		$query->execute();
		
		$db['id'] = 0;
		$db['objeto'] = "";
		$db['comentario'] = "";
		$db['tags'] = "";

		while($dbinfo = $query->fetch(1)){
			$db['id'] = $dbinfo['id'];
			$db['objeto'] = $dbinfo['objeto'];
			$db['comentario'] = $dbinfo['comentario'];
			$db['tags'] = $dbinfo['tags'];
		}

		return ($db);
	}

	public function save($objeto, $comentario,$tags){

		$query=$this->db->prepare("
			INSERT INTO  dbcomments (objeto,comentario,tags) values (:objeto , :comentario, :tags) 
			ON DUPLICATE KEY UPDATE comentario = :comentario, tags = :tags;");
		
		$query->bindParam(':objeto', $objeto);
		$query->bindParam(':comentario', $comentario);
		$query->bindParam(':tags', $tags);

		$query->execute();
	}
}