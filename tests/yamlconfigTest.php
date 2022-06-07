<?php
use PHPUnit\Framework\TestCase;
use ITEC\DAW\PROG\CONFIGFILE\yamlConfig;

class yamlTest extends TestCase{
    public function test_yaml_config_file_exists(){
        $yamlConfig = new yamlConfig('tmp/yamlconfigTest.yml');
        $this->assertFileExists('tmp/yamlconfigTest.yml');
        $yamlConfig->removeFile();
        $this->assertTrue(!file_exists('tmp/yamlconfigTest.yml'));
    }

}