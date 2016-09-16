<?php

// Define routes
$app->get('/', function () use ($app) {
    #$app->log->info("MysqlDbDoc '/' route");

	if(!isset($_SESSION['current_host'])){
		$app->render('index.tpl');
	} else {
		$app->render('indexstart.tpl');
	}
    
});



$app->get('/load',function() use ($app){
	$conexoes = new DbConnectionAdmin($app->dbauthentication);
    $an =  new DataAnalyze($conexoes->get(1));
    print_r($an->getSchemas());
});


// Define 404 template
$app->notFound(function () use ($app) {
    $app->render('404.tpl');
});