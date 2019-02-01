<?php
namespace Model;
defined('_Sdef') or exit();
class DBDriver{
    private $db, $gateway;
    public function __construct()
    {
        $this->db = new \Model\DBDriverLibrary\DataBase(DB_HOST,DB_NAME,DB_USER,DB_PASSWORD);
        $this->gateway = new \Model\DBDriverLibrary\TableDataGateway($this->db->getPdo(),DB_TABLE);
    }
    public function addFile($file){
        $this->gateway->addFile($file);
    }
    public function getFiles(){
        $result = $this->gateway->getFiles();
        return $result;
    }
    public function getFile($id){
        $result = $this->gateway->getFile($id);
        return $result;
    }
}