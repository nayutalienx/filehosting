<?php
\Slim\Route::setDefaultConditions(array(
	'id'=>"[0-9]+", 
	'name' => "[a-zA-Z]{3,10}"));
$app->get('/:id/:name',function($id,$name) use($app){
	
	$loader = new Twig_Loader_Filesystem('resources/views');
	$twig = new Twig_Environment($loader);
	echo $twig->render('index.html', ['name' => $name,
									  'id' => $id]);
	
	
	

})->name('myRoute');

$app->get('/huyandko/:data',function($data){
	
	echo 'hui '.$data;

})->name('huy');

$getAdmin = function() use($app){
	echo 'you are admin';
};
$authAdmin = function() use($app) {
	
	$app->redirect($app->urlFor('myRoute',array(
		'id'=>34,
		'name'=>'admen')));

};
$app->get('/admin',$authAdmin,$getAdmin);