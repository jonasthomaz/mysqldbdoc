<?php
/**
 * Core do sistema 
 **/

class CoreInfo extends Slim\Middleware{
	protected $db;

	public function __construct(PDO $dbcon){
        $this->db = $dbcon;
    }

	public function call(){
		$this->app->hook('slim.before.dispatch', array($this, 'loadinfo'));
		$this->next->call();
    }

    public function loadinfo(){
    	$conexoes = new DbConnectionAdmin($this->db); 	
    	$data['lstServidores']=$conexoes->getlist();


    	//identifica o servidor atual
    	$data['current_host']='local';

    	$this->app->view()->setData($data); 
    }

}