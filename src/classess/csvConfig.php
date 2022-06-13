<?php
namespace ITEC\DAW\PROG\CONFIGFILE;

use ITEC\DAW\PROG\FILE\file;

class csvConfig extends file implements iconfig{
    private array|null $parsed;
    private string $content;

    public function __construct(string $filename){
        parent::__construct($filename);
        $this->content = $this->getContent();
        $this->parsed = $this->parseCSV();
    }

    public function addVars(string $name, $value){
        $this->parsed[$name] = $value;
        $this->content = $this->array2csv($this->parsed);
        $this->writeFile();
    }
    public function removeVars(string $name){
        unset ($this->parsed[$name]);
        $this->content = $this->array2csv($this->parsed);
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

    private function array2csv():string{
        $csvheader = implode(";",array_keys($this->parsed)).PHP_EOL;
        $csvvalues= implode(";",array_values($this->parsed)).PHP_EOL;
        $out = $csvheader.$csvvalues;
        return $out;
    }

    private function parseCSV(){
        if ($this->content =="") return [];
        $lines = explode("\n",$this->content);
        $i=0;
        $out=[];
        $keys = explode(";",$lines[0]);
        $values = explode(";",$lines[1]);
        for ($i=0;$i<count($keys);$i++)
            $out[$keys[$i]]= $values[$i];
        return $out;
    }
}