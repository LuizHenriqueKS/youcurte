<?php

require_once 'config.php';

/**
 * Leitor de classes
 *
 * Serve para requisitar outras classes PHP
 * 
 * @author Luiz Henrique
 */
class Loader {
    
    protected $classe,$name,$path;
    
    public function __construct($classe = "") {
        $this->classe = $classe;
    }
    
    /**
     * Retorna o caminho da classe
     */
    public function getPath(){
        if (isset($this->path)){
            return $this->path;
        } else {
            if (strstr($this->classe,DS)){
                $this->path = substr($this->classe, strrpos($this->classe));
            } else {
                $this->path = '';
                return '';
            }
        }
    }
    
    public function hasPath(){
        return !empty($this->getPath());
    }
    
    
    /**
     * Retorna o nome da classe
     */
    public function getName(){
        if (isset($this->name)){
            return $this->name;
        } else {
            if ($this->hasPath()){
                $this->name=substr($classe,strlen($this->getPath()));
                $this->name=  str_replace($this->name, DS, '');
                return $this->getName();
            } else{
                $this->name = $classe;
                return $this->getName();
            }
        }
    }
    
    public function load($classe = NULL){
        if (isset($classe)) {
            $this->classe = classe;
        }
        $php = RESTRITO.$this->path.DS.$this->name;
        require_once $php;
    }
    
    public static function  loadLibrary($class){
        $loader = new Loader($class);
        $loader->load();
    }
    
}
