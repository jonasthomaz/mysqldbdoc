<?php

/**
 * Lista as conexoes cadastradas no banco de dados para edição
 */ 
$app->get('/connections',function() use ($app){
	$conexoes = new DbConnectionAdmin($app->dbauthentication);
    
	$app->render('conexoes-list.tpl');
});

/**
 * Alterna a conexão que esta sendo usada
 */ 
$app->get('/connections/change/:id',function($id) use ($app){
    $conexoes = new DbConnectionAdmin($app->dbauthentication); 
    $an =  $conexoes->get($id);

    //remove a sessão atual
    unset($_SESSION['current_host']);
	
	$_SESSION['current_host'] = array(
		'id'=>$an['id'],
		'hostname'=>$an['hostname'],
		'alias'=>$an['alias']
	);

	$app->redirect(APP_URI);
});


$app->get('/connections/list',function() use ($app){
	$app->render('template.tpl');
});


$app->get('/connections/add',function() use ($app){
	$app->render('template.tpl');
});


$app->get('/connections/edit',function() use ($app){
	$app->render('template.tpl');
});


