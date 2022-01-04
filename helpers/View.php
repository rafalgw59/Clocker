<?php

class View
{
    protected $_data = array();
    protected $_file;

    public function __construct($file)
    {
        $this->_file=$file;
    }

    public function set($key,$value){

        $this->_data[$key]=$value;
    }

    public function __get($name){
        if (array_key_exists($name,$this->_data)){
            return $this->_data[$name];
        }
    }
}