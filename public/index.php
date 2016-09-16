<?php
session_cache_limiter(false);
session_start();

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../configs/database.php';
require '../configs/filesystem.php';
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

//Inclusão do arquivo de singleton
require_once('../singletons.php');


//inclusao de rotas
require_once('core.php');
require_once('conexoes.php');

$app->add(new CoreInfo($app->dbauthentication));

// Run app
$app->run();
