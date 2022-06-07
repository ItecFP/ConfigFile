<?php
namespace ITEC\DAW\PROG\CONFIGFILE;
use \Exception;
use ITEC\DAW\PROG\FILE\file;
use \Ini\Parser;

class iniConfig extends file implements iconfig{
    private array|null $parsed;
    private string $content;

    public function __construct(string $filename){
        parent::__construct($filename);
        $this->content = $this->getContent();
        try {
            $ini = new Parser();
            $ini->treat_ini_string = true;
            $this->parsed = $ini->parse($this->content);
        } catch (Exception $e) {
            echo ('Unable to parse the INI string:'. $e->getMessage());
        }   
    }

    public function addVars(string $name, $value){
        $this->parsed[$name] = $value;
        $this->content = Yaml::dump($this->parsed);
        $this->writeFile();
    }
    public function removeVars(string $name){
        unset ($this->parsed[$name]);
        $this->content = Yaml::dump($this->parsed);
        $this->writeFile();
    }
    public function modifyVars(string $name,$value){
        $this->addVars($name,$value);
    }
    public function readVars(string $name):string{
        return $this->parsed[$name];
    }
}