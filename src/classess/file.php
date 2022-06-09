<?php
    namespace ITEC\DAW\PROG\FILE;
    use Exception;
    class file{
        private string $filename;
        private string $content;


        public function __construct(string $filename){
            $this->filename = $filename;
            $this->content = file_get_contents($this->filename);    
        }
        
        public function openOrCreateFile(string $filename):file{
           return new file($filename);
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
            file_put_contents($this->filename, $this->content);
        }
    }    