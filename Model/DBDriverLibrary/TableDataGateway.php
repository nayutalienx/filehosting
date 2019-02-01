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

}