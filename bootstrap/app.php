<?php
require 'vendor/autoload.php';
use Slim\Slim;
$app = new Slim();
require 'app/routes.php';
$app->run();