<?php
namespace Controller;
defined('_Sdef') or exit();
class ListController extends AController{
    public function execute($param = array())
    {
        $files = $this->model->getFiles();
        $this->display($files);
    }
    public function display($files){
        $this->app->render('index.html',array('files' => $files));
    }
}