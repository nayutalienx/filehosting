<?php
define('_SDef',TRUE);
require 'vendor/autoload.php';
require 'Libraries/CustomView.php';
require 'Controller/AddController.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim(array(
    'templates.path'=>'templates',
    'view'=>new CustomView
));

\Slim\Route::setDefaultConditions(array(
	'id'=>"[0-9]+", 
	'name' => "[a-zA-Z]{3,10}"));


$app->get('/',function() use($app){
	$app->render('index.html',array('name' => 'default', 'id' => 23));
})->name('home');

$app->post('/add', \Controller\AddController::index());


$app->run();



