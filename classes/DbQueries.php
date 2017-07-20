<?php
/**
 * Classe para salvar comentarios
 * @author 		Jonas Thomaz de Faria 	jonasthomaz@gmail.com
 * @version 	0.0.1
 */

class DbQueries{

	private $db;

	/**
	 * Construtor da classe
	 * @param  	pdo 	Conexão PDO
	 */ 
	public function __construct($db) {
		$this->db = $db;
	}	

	/**
	 * Retorna uma querie 
	 */ 
	public function get($objeto){
		$db = array();
		$query=$this->db->prepare("select * from dbqueries where objeto = :objeto");
		$query->bindParam(':objeto', $objeto);
		$query->execute();
		
		$db['id'] = 0;
		$db['objeto'] = "";
		$db['query'] = "";

		while($dbinfo = $query->fetch(1)){
			$db['id'] = $dbinfo['id'];
			$db['objeto'] = $dbinfo['objeto'];
			$db['query'] = utf8_encode($dbinfo['query']);
		}

		return ($db);
	}

	/**
	 * Salva uma querie
	 * @param string 	Objeto relacionado a querie
	 * @param string 	Query 
	 */ 
	public function save($objeto, $query){

		$query=$this->db->prepare("
			INSERT INTO  dbqueries (objeto, querie) values (:objeto , :query) 
			ON DUPLICATE KEY UPDATE query = :query;");
		
		$query->bindParam(':objeto', $objeto);
		$query->bindParam(':query', utf8_decode($query));

		$query->execute();
	}

	/**
	 * Realiza a busca na base de Informações.
	 * @param 	array 	Array com argumentos de Busca
	 * @return 	array 	Array com resultados da Busca
	 */ 
	public function find($arg){
		$db = array();

		if(isset($arg['host']) && isset($arg['querie'])){
			$arg['host'] = '/'.$arg['host'];
			$query = $this->db->prepare(
				"select 
					* 
				from 
					dbqueries 
				where 
					objeto like '".$arg['host']."%' 
					AND (querie like '%".$arg['querie']."%' OR  tags like '%".$arg['querie']."%')"
			);
			$query->execute();
			while($dbinfo = $query->fetch()){
				$db[] = array(
					'id'=> $dbinfo['id'], 
					'objeto' => $dbinfo['objeto'], 
					'querie' => utf8_encode($dbinfo['querie'])
				);
			}
		}

		return ($db);
	}
}