<?php
define('_Sdef',TRUE);
require 'vendor/autoload.php';
require 'Libraries/models/CustomView.php';

\Slim\Slim::registerAutoloader();

function my_autoload($className){
	$fileName = __DIR__.DIRECTORY_SEPARATOR;
	$namespace = "";
	if($lastNsPost = strripos($className, '\\')){
		$namespace = substr($className, 0,$lastNsPost);
		$className = substr($className,$lastNsPost+1);
		$fileName .= str_replace('\\',DIRECTORY_SEPARATOR,$namespace).DIRECTORY_SEPARATOR;
	}
	$fileName .= strtolower($className).'.php';
	if(file_exists($fileName)){
		require_once $fileName;
	}
	

}

spl_autoload_register('my_autoload');

$app = new \Slim\Slim(array(
    'templates.path'=>'templates',
    'view'=>new CustomView
));

\Slim\Route::setDefaultConditions(array(
	'id'=>"[0-9]+", 
	'name' => "[a-zA-Z]{3,10}"));


$app->get('/',function() use($app){
	$o = \Controller\AController::getInstance('index');
	$o->execute();
	
	$app->render('index.html');
	
})->name('home');

$app->post('/add', function(){
	$o = \Controller\AController::getInstance('add');
	$o->execute(array('FILES' => $_FILES));
	
});


$app->run();



