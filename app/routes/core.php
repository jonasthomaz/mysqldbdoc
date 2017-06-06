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
	$conexoes = new DbConnectionAdmin($app->dbauthentication);
	$objComments =  new DbComments($app->dbauthentication);
	$an =  new DataAnalyze($conexoes->get(1));

	if(!isset($_SESSION['current_host'])){
		$app->redirect('/');
	}

    if($field != ''){
    	//rendereriza Campo
		$data['titulo'] = $field;

	    $data['breadcrumb']['localhost'] = APP_URI."read";
	    $data['breadcrumb'][$schema] = APP_URI."read/$schema";
	    $data['breadcrumb'][$table] = APP_URI."read/$schema/$table";
	    $data['breadcrumb'][$field] = '#';

	    $data['fieldinfo'] = $an->getFieldInfo($schema, $table, $field);
	    $data['path_link'] = APP_URI."read/$schema/$table/$field";
	    
	    $data['objeto'] = "/".$_SESSION['current_host']['alias']."/$schema/$table/$field";
	    $data['comments'] = $objComments->get($data['objeto']);
	    $app->view()->setData($data);
    	$app->render('template-field.tpl');
    }elseif($table != ''){
    	//rendereiza Tabela
    	$data['titulo'] = $table;

	    $data['breadcrumb']['localhost'] = APP_URI."read";
	    $data['breadcrumb'][$schema] = APP_URI."read/$schema";
	    $data['breadcrumb'][$table] = '#';
	    $data['fields'] = $an->getFields($schema, $table);
	    $data['path_link'] = APP_URI."read/$schema/$table";
	    $data['objeto'] = "/".$_SESSION['current_host']['alias']."/$schema/$table";
	    $data['comments'] = $objComments->get($data['objeto']);
	    $app->view()->setData($data);
    	$app->render('template-table.tpl');
    }elseif($schema != ''){
    	//rendere schema
    	$data['titulo'] = $schema;
		$data['schema'] = $schema;
	    $data['breadcrumb']['localhost'] = APP_URI."read";
	    $data['breadcrumb'][$schema] = '#';
	    $data['tables'] = $an->getTables($schema);
	    $data['path_link'] = APP_URI."read/$schema";
	    $data['objeto'] = "/".$_SESSION['current_host']['alias']."/$schema";
	    $data['comments'] = $objComments->get($data['objeto']);
	    $app->view()->setData($data);
    	$app->render('template-database.tpl');
    }else{
    	$data['titulo'] = $_SESSION['current_host']['alias'];

	    $data['breadcrumb']['localhost'] = '#'; 
	    $data['schemas'] = $an->getSchemas();
	    $data['objeto'] = "/".$_SESSION['current_host']['alias'];
	    $data['comments'] = $objComments->get($data['objeto']);
	    $app->view()->setData($data);
    	$app->render('template-schema.tpl');
    }
});


$app->post('/savecomment', function () use ($app) {
	$destino='';

    $objComments =  new DbComments($app->dbauthentication);
    $objComments->save($_POST['objeto'],$_POST['comment'],$_POST['tags']);
	
    if (strpos($_POST['objeto'], "/".$_SESSION['current_host']['alias']) !== false){
        $occurrence = strpos($_POST['objeto'], "/".$_SESSION['current_host']['alias']);
        $destino = substr_replace($_POST['objeto'],'', strpos($_POST['objeto'], "/".$_SESSION['current_host']['alias']), strlen("/".$_SESSION['current_host']['alias']));
    }

	$app->redirect('/read'.$destino);
});


$app->get('/busca', function () use ($app) {
	
});

$app->post('/busca', function () use ($app) {
	$conexoes = new DbConnectionAdmin($app->dbauthentication);
	$objComments =  new DbComments($app->dbauthentication);
	$an =  new DataAnalyze($conexoes->get(1));

	if(!isset($_SESSION['current_host']))
		$app->redirect('/');

	$conexoes = new DbConnectionAdmin($app->dbauthentication);
	$objComments =  new DbComments($app->dbauthentication);
	$an =  new DataAnalyze($conexoes->get(1));
	print_r($_POST);
});