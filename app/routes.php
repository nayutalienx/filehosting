<?php
$app->get('/:name',function($name){
	
	$loader = new Twig_Loader_Filesystem('resources/views');
	$twig = new Twig_Environment($loader);
	echo $twig->render('index.html', ['name' => $name]);

});

$app->get('/',function(){
	
	echo 'hui';

});