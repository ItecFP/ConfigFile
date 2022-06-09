<?php
use PHPUnit\Framework\TestCase;
use ITEC\DAW\PROG\CONFIGFILE\iniConfig;

class iniconfigTest extends TestCase{
    public function test_yaml_config_file_exists(){
        $yamlConfig = new iniConfig('tmp/iniconfigTest.yml');
        $this->assertFileExists('tmp/iniconfigTest.yml');
        $yamlConfig->removeFile();
        $this->assertTrue(!file_exists('tmp/iniconfigTest.yml'));
    }

}