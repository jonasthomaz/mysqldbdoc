<?php
/**
 * Classe que gerencia as as bases de dados documentadas
 * @author 		Jonas Thomaz de Faria 	jonasthomaz@gmail.com
 * @version 	0.0.1
 */

class DbConnectionAdmin{

	private $db;

	/**
	 * Construtor da classe
	 * @param  	pdo 	Conexão PDO
	 */ 
	public function __construct($db) {
		$this->db = $db;
	}	


	/**
	 * Adiciona Conexao no Banco de dados
	 * @param 	array 	Array com informações da conexao
	 * @return 	int 	Id da conexao inserida
	 */ 
	public function add(array $data){

	}

	
	/**
	 * Deleta conexao da base de dados
	 * @param 	int  	id da conexão que será deletada
	 * @return 	bool 	sucesso/falha na exclusao	
	 */
	public function del($conexao_id){
		
	}


	/**
	 * Retorna array de conexão para uma das conexoes cadastradas
	 * @param 	int 	Id da conexão
	 * @return 	array 	Array com informações da conexão
	 */
	public function get($conexao_id){
		$db = array();
		$query=$this->db->prepare("select * from dbconnections where id = :conexao_id");
		$query->bindParam(':conexao_id', $conexao_id);
		$query->execute();
		
		while($dbinfo = $query->fetch(1)){
			$db['id'] = $dbinfo['id'];
			$db['hostname'] = $dbinfo['hostname'];
			$db['database'] = $dbinfo['database'];
			$db['port'] = $dbinfo['port'];
			$db['username'] = $dbinfo['username'];
			$db['password'] = $dbinfo['password'];
		}

		return ($db);
	}


	/**
	 * Retorna listagem das Conexões Cadastradas
	 * @param
	 * @return array 	Listagem com nome e ids das conexões cadastradas
	 */ 
	public function getlist(){
		$conections = array();
		$query=$this->db->prepare("select * from dbconnections order by alias asc");
		$query->execute();
		
		while($dbinfo = $query->fetch()){
			$conections[]=array('id' => $dbinfo['id'], 'alias' => $dbinfo['alias']);
		}

		return ($conections);
	}
}