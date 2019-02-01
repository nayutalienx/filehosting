<?php
namespace Controller;
defined('_Sdef') or exit();
class FilePageController extends AController{
    public function execute($param = array())
    {
        $file = $this->getFile($param['id']);
        $fileBody = file_get_contents('loaded_files/'.$file['name']);
        $theURI = "http://localhost/filehost/";
        
        $imageURI = $theURI.'/loaded_files'.'/'.$file['name'];
        echo '<img src="'.$imageURI.'">';
    }

    public function getFile($id){
        $model = $this->getModel();
        $file = $model->getFile($id);
        return $file;
    }
}

