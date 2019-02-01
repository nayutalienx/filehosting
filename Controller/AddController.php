<?php
namespace Controller;
class AddController extends ADisplayController{
    public function execute ($param = array()){
        $data = $param['FILES'];
        if(isset($data['file'])){
            move_uploaded_file($data['file']['tmp_name'],'loaded_files/'.$data['file']['name']);
            echo 'i have file!';
        }else{
            echo 'error';
        }
    }
    protected function getMenu()
    {
        
    }
    protected function display()
    {
        
    }
}