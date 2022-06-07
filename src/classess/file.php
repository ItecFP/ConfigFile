<?php
    namespace ITEC\DAW\PROG\FILE;
    use Exception;

    class file{
        private string $filename;
        private $file;
        private string $content;


        public function __construct(string $filename){
            $this->filename = $filename;
            $this->file = fopen($this->filename, "w");
            if(!$this->filename){
                throw new Exception("Error al crear el archivo");
            }
            $this->readFile();
        }
        
        public function openOrCreateFile(string $file):file{
           return new file($file);
        }
        public function readFile():void{
            $this->content = filesize($this->filename)>0?fread($this->file, filesize($this->filename)):"";
        }
        public function getContent():string{
            return $this->content;
        }
        public function removeFile():bool{
            return unlink($this->filename);
        }
        public function writeFile(){
            if(!file_exists($this->filename))
                throw new Exception("El archivo no existe");
            fwrite($this->file, $this->content);
            fclose($this->file);
        }
    }    