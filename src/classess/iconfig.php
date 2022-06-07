<?php
    namespace ITEC\DAW\PROG\CONFIGFILE;
    interface iconfig{
        public function createFile(string $file):bool;
        public function readFile(string $file):string;
        public function removeFile(string $file):bool;
        public function writeFile(string $file, string $constent):bool;

        public function addVars(string $name, $value):bool;
        public function removeVars(string $name):bool;
        public function modifyVars(string $name,$value):bool;
        public function readVars(string $name):string;
    }