<?php
namespace Controller;
class AddController{
    public static function index (){
        if(isset($_FILES['file'])){
            move_uploaded_file($_FILES['file']['tmp_name'],'loaded_files/'.$_FILES['file']['name']);
            echo 'i have file!';
        }else{
            echo 'error';
        }
    }
}