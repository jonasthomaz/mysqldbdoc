<?php
/**
 * Classe que analista bases de dados para construir schema e identificar 
 * alterações
 **/

class DataAnalyze{
	//Conexão com Base de dados a ser analisada
	protected $db_connection;
	protected $dbinfo;
	
	/**
	 * Contrutor da Classe
	 * @param 	array 	informacoes da conexao
	 * @return 	bool 	resultado da tentativa de conexão
	 */
	public function __construct(array $dbinfo) {
		$this->dbinfo = $dbinfo;
		return $this->dbconnect();
	}

	/**
	 * Realiza conexão com banco de dados
	 * @param 
	 * @return bool 	resultado da tentativa de conexão com a base de dados informado
	 */ 
	private function dbconnect(){
		try {
			$this->db_connection = new PDO("mysql:host=".$this->dbinfo['hostname'].";dbname=".$this->dbinfo['database'], $this->dbinfo['username'], $this->dbinfo['password']);
			$this->db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		} catch (PdoException $e) {
			print_r($e);
			return false;
		}
		return true;
	}


	public function getSchemas(){
		$query=$this->db_connection->query('SHOW DATABASES');
		$schemas=$query->fetchAll(PDO::FETCH_ASSOC);
		return $schemas;
	}

	public function getTables($schema){
		$query = $this->db_connection->prepare("SHOW TABLES FROM $schema");
		$query->execute();

		$tables=$query->fetchAll(PDO::FETCH_ASSOC);
		return $tables;
	}


	public function getFields($schema,$table){
		$query = $this->db_connection->prepare('SHOW COLUMNS FROM '.$schema.'.'.$table);
		$query->execute();

		$fields=$query->fetchAll(PDO::FETCH_ASSOC);
		return $fields;
	}	

	public function getFieldInfo($schema,$table,$field){
		$query = $this->db_connection->prepare('SHOW COLUMNS FROM '.$schema.'.'.$table.' WHERE Field=:field');
		$query->bindParam(':field',$field);
		$query->execute();

		$fields=$query->fetchAll(PDO::FETCH_ASSOC);
		return $fields;
	}
	
}