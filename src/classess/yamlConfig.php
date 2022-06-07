<?php
namespace ITEC\DAW\PROG\CONFIGFILE;

use ITEC\DAW\PROG\FILE\file;
use \Symfony\Component\Yaml\Yaml;
use \Symfony\Component\Yaml\Exception\ParseException;

class yamlConfig extends file implements iconfig{
    private array|null $parsed;
    private string $content;

    public function __construct(string $filename){
        parent::__construct($filename);
        $this->content = $this->getContent();
        try {

            $this->parsed = Yaml::parse($this->content);
        } catch (ParseException $e) {
            echo ('Unable to parse the YAML string:'. $e->getMessage());
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