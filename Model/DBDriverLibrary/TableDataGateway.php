<?php
namespace Model\DBDriverLibrary;
class TableDataGateway{
    private $pdo,$table;
    public function __construct($pdo,$table){
        $this->pdo = $pdo;
        $this->table = $table;
    }
    public function addFile(File $file){
        $sql = "INSERT INTO $this->table (name, size) VALUES (:name, :size)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['name'=>$file->getName(),
                        'size'=>$file->getSize()]);
    }
    public function getFiles(){
        $sql = "SELECT * FROM $this->table ORDER BY date DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getFile($id){
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;

    }

}