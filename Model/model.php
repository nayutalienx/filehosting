<?php
namespace Model;
defined('_Sdef') or exit();
class Model{
    public $driver;
    public function __construct()
    {
        $this->driver = new \Model\DBDriver;
    }
    public function addFile($file){
        $this->driver->addFile($file);

    }
    public function getFiles(){
        $result = $this->driver->getFiles();
        return $result;
    }
    public function getFile($id){
        $result = $this->driver->getFile($id);
        return $result;
    }
}