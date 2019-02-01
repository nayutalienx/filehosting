<?php
class File{
    private $name,$size,$date;
    public function __construct($name,$size,$date){
        $this->name = $name;
        $this->size = $size;
        $this->date = $date;
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