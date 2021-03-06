﻿<?php
class CustomView extends \Slim\View
{
    protected $twig;
    public function __construct(){
        parent::__construct();
        
    }

    protected function getTwig(){
        $loader = new Twig_Loader_Filesystem($this->getTemplatesDirectory());
        return new Twig_Environment($loader,array());
    }

    protected function render($template,$data = null){
        $this->twig = $this->getTwig();
        $data = array_merge($this->data->all(), (array) $data);
        return $this->twig->render($template, $data);
    }
}