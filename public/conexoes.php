<?php

$app->get('/connections',function() use ($app){
	$app->render('template.tpl');
});

$app->get('/connections/change/:id',function($id) use ($app){
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


