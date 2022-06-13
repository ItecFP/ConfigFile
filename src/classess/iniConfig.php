<?php
namespace ITEC\DAW\PROG\CONFIGFILE;
use \Exception;
use ITEC\DAW\PROG\FILE\file;

class iniConfig extends file implements iconfig{
    private array|null $parsed;
    private string $content;

    public function __construct(string $filename){
        parent::__construct($filename);
        $this->content = $this->getContent();       
        $this->parsed =parse_ini_string($this->content);
    }
    public function addVars(string $name, $value){
        $this->parsed[$name]=$value;
        $this->content = $this->arr2ini($this->parsed);
        $this->writeFile();
    }
    public function removeVars(string $name){
        unset ($this->parsed[$name]);
        $this->content = $this->arr2ini($this->parsed);
        $this->writeFile();
    }
    public function modifyVars(string $name,$value){
        $this->addVars($name,$value);
    }
    public function readVars(string $name):string{
        return $name==""?
            "":
            (
                (isset($this->parsed[$name]))?
                    $this->parsed[$name]:
                    ""
            );
    }

    private function arr2ini(array $a, array $parent = array()){
        $out = '';
        foreach ($a as $k => $v){
            if (is_array($v)) {
                $sec = array_merge((array) $parent, (array) $k);
                $out .= '[' . join('.', $sec) . ']' . PHP_EOL;
                $out .= $this->arr2ini($v, $sec);
            }else
                $out .= "$k=$v" . PHP_EOL;
        }
        return $out;
    }
}