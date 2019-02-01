<?php
namespace Model\DBDriverLibrary;
class File{
    private $name,$size,$date;
    public function __construct($name,$size){
        $this->name = $name;
        $this->size = $size;
        
    }
    public function getName(){
        return $this->name;
    }
    public function getSize(){
        return $this->size;
    }
    public function getDate(){
        return $this->date;
    }
}