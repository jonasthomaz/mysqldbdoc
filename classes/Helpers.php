<?php
/**
 * Classe com definição de helpers
 **/

class Helpers{
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

	
	public static function breadcrumb($nodes){
		$breadcrumb = '';

		foreach ($nodes as $key => $value) {
			if($breadcrumb!='')
				$breadcrumb .= ' >> ';
			
			if($value !='#')
				$breadcrumb .= "<a href='$value'>". $key ."</a>" ;
			else
				$breadcrumb .= " $key ";
		}

		return $breadcrumb;
	}
	
}