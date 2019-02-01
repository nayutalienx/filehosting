<?php
namespace Controller;
class AddController extends AController{
    public function execute ($param = array()){
        $data = $param['FILES'];
        if(isset($data['file'])){
            move_uploaded_file($data['file']['tmp_name'],'loaded_files/'.$data['file']['name']);
            $file = new \Model\DBDriverLibrary\File($data['file']['name'],$data['file']['size']);
            
            $this->model->addFile($file);
            echo 'uploaded';
            
        }
    }

}