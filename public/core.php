<?php
// Define 404 template
$app->notFound(function () use ($app) {
    $app->render('404.tpl');
});

// Define routes
$app->get('/', function () use ($app) {
    #$app->log->info("MysqlDbDoc '/' route");
	if(!isset($_SESSION['current_host'])){
		$app->render('index.tpl');
	} else {
		//$app->render('indexstart.tpl');
		$app->redirect('/read');
	}
});


$app->get('/read(/:schema(/:table(/:field)))',function($schema = '', $table = '', $field='') use ($app){
    




    if($field != ''){
    	//rendereriza Campo
    	$conexoes = new DbConnectionAdmin($app->dbauthentication);
	    $an =  new DataAnalyze($conexoes->get(1));

	    $data['breadcrumb']['localhost'] = APP_URI."read";
	    $data['breadcrumb'][$schema] = APP_URI."read/$schema";
	    $data['breadcrumb'][$table] = APP_URI."read/$schema/$table";

	    $data['fieldinfo'] = $an->getFieldInfo($schema, $table, $field);
	    $data['path_link'] = APP_URI."read/$schema/$table/$field";
	    $app->view()->setData($data);
    	$app->render('template-field.tpl');
    }elseif($table != ''){
    	//rendereiza Tabela
    	$conexoes = new DbConnectionAdmin($app->dbauthentication);
	    $an =  new DataAnalyze($conexoes->get(1));

	    $data['breadcrumb']['localhost'] = APP_URI."read";
	    $data['breadcrumb'][$schema] = APP_URI."read/$schema";
	    
	    $data['fields'] = $an->getFields($schema, $table);
	    $data['path_link'] = APP_URI."read/$schema/$table";
	    $app->view()->setData($data);
    	$app->render('template-table.tpl');
    }elseif($schema != ''){
    	//rendere schema
    	$conexoes = new DbConnectionAdmin($app->dbauthentication);
	    $an =  new DataAnalyze($conexoes->get(1));

	    $data['breadcrumb']['localhost'] = APP_URI."read";
	    
	    $data['schema'] = $schema;
	    $data['tables'] = $an->getTables($schema);
	    $data['path_link'] = APP_URI."read/$schema";
	    $app->view()->setData($data);
    	$app->render('template-schema.tpl');
    }else{
    	$conexoes = new DbConnectionAdmin($app->dbauthentication);
	    $an =  new DataAnalyze($conexoes->get(1));
	    $data['breadcrumb'] = array();
	    $data['schemas'] = $an->getSchemas();
	    $app->view()->setData($data);
    	$app->render('template-database.tpl');
    }
});