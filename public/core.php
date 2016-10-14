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
		$app->render('indexstart.tpl');
	}
});


$app->get('/read(/:schema(/:table(/:field)))',function($schema = '', $table = '', $field='') use ($app){
    


    if($field != ''){
    	//rendereriza Campo
    	$breadcrumb=" $schema > $table > $field ";
    }elseif($table != ''){
    	//rendereiza Tablea
    	$conexoes = new DbConnectionAdmin($app->dbauthentication);
	    $an =  new DataAnalyze($conexoes->get(1));
	    $data['breadcrumb'] = " $schema > $table";
	    $data['schema'] = $schema;
	    $data['table'] = $table;
	    $data['fields'] = $an->getFields($schema.$table);
	    $data['link'] = "/read/$schema/$table/";
	    $app->view()->setData($data);
    	$app->render('template-table.tpl');

    }elseif($schema != ''){
    	//rendere schema
    	$conexoes = new DbConnectionAdmin($app->dbauthentication);
	    $an =  new DataAnalyze($conexoes->get(1));
	    $data['breadcrumb'] = " $schema";
	    $data['schema'] = $schema;
	    $data['tables'] = $an->getTables($schema);
	    $data['link'] = "/read/$schema";
	    $app->view()->setData($data);
    	$app->render('template-schema.tpl');

    }else{
    	$conexoes = new DbConnectionAdmin($app->dbauthentication);
	    $an =  new DataAnalyze($conexoes->get(1));
	    $data['schemas'] = $an->getSchemas();
	    $app->view()->setData($data);
    	$app->render('template-database.tpl');

    }
});


