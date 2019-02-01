<?php
define('_Sdef',TRUE);
require 'vendor/autoload.php';
require 'Model/CustomView.php';
define('DB_HOST','localhost');
define('DB_NAME','filehosting');
define('DB_TABLE','files');
define('DB_USER','root');
define('DB_PASSWORD','');
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
	$o = \Controller\AController::getInstance('list');
	$o->execute();
	
	
	
})->name('home');

$app->post('/add', function(){
	$o = \Controller\AController::getInstance('add');

	$o->execute(array('FILES' => $_FILES));
	
});

$app->get("/file/:id",function($id){
	$o = \Controller\AController::getInstance('filepage');
	$o->execute(array('id' => $id));
});


$app->run();



