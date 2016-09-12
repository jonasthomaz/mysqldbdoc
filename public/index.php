<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../configs/database.php';
//Autoload das Classes
spl_autoload_register(function ($classname) {
    require ("../classes/" . $classname . ".php");
});


// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => '../templates',
));

// Create monolog logger and store logger in container as singleton 
// (Singleton resources retrieve the same log resource definition each time)
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('slim-skeleton');
    $log->pushHandler(new \Monolog\Handler\StreamHandler('../logs/app.log', \Monolog\Logger::DEBUG));
    return $log;
});

// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath('../templates/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());



//Inclusão do arquivo de singleton
require_once('../singletons.php');

// Define routes
$app->get('/', function () use ($app) {
    $app->log->info("MysqlDbDoc '/' route");
    //$app->render('index.html');

    $conexoes = new DbConnectionAdmin($app->dbauthentication);
    $an =  new DataAnalyze($conexoes->get(1));
    print_r($an->getSchemas());
});

// Run app
$app->run();
