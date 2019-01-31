<?php
define('_SDef',TRUE);
require 'vendor/autoload.php';
require 'Libraries/CustomView.php';
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

$app->post('/add',function(){
	if($_FILES['file']){
		move_uploaded_file($_FILES['file']['tmp_name'],'loaded_files/'.$_FILES['file']['name']);
		echo 'i have file!';
	}else{
		echo 'error';
	}
});


$app->run();



