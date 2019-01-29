<?php
require 'vendor/autoload.php';
use Slim\Slim;

function mw1()
{
	echo 'Я мв1';
}


$app = new Slim();
$app->get('/:name','mw1',function($name){
	
	$loader = new Twig_Loader_Filesystem('templates/');
	$twig = new Twig_Environment($loader);
	echo $twig->render('index.html', ['name' => $name]);

});
$app->run();


