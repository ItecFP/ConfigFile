<?php
    namespace ITEC\DAW\PROG\CONFIGFILE;
    interface iconfig{
        public function addVars(string $name, $value);
        public function removeVars(string $name);
        public function modifyVars(string $name,$value);
        public function readVars(string $name):string;
    }