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

    public function DPtest_iniconfig_parse1(){
        return [
            "iniunvalorSimple"=>[
                'coverage',
                "./tmp/iniconfigSimpleValuetest.ini",
                "debug"
            ],
            "inivacio"=>[
                "",
                "./tmp/iniconfigtest.ini",
                ""
            ]
        ];
    }



    /**
     * @dataProvider DPtest_iniconfig_parse1
     */
    public function test_iniconfig_parse1($esperado, $filename, $name){
        //if ($esperado=="") 
            //$this->expectException('Unable to parse the INI string:');
        $iniConfig = new iniConfig($filename);
        $this->assertEquals($esperado,$iniConfig->readVars($name));
    }
}