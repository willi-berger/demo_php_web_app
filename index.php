<?php

require __DIR__ . '/vendor/autoload.php';

use Common\Router;
use Common\Application;

//var_dump($_SERVER);
var_dump(parse_ini_file("app.ini", true));

/** @var Application $application */
$application = new Application();
$application->initialize();


$result = $application->getRouter()->processRequest();

$view_model_data = $result->getView()->getData();

if ($result->isIsApiResult()) {
    header('Content-Type: application/json; charset=utf-8');
    
    echo json_encode($view_model_data);
    
} else {
    
    require __DIR__ . '/src/view/header.php';
    $result->getView()->view();
    require __DIR__ . '/src/view/footer.php';
    
}

