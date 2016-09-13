<?php
$app->get('/load',function() use ($app){
	$conexoes = new DbConnectionAdmin($app->dbauthentication);
    $an =  new DataAnalyze($conexoes->get(1));
    print_r($an->getSchemas());
});


// Define 404 template
$app->notFound(function () use ($app) {
    $app->render('404.html.twig');
});