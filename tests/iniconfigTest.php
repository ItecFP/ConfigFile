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
            "inivacio"=>[
                "",
                "./tmp/iniconfigtest.ini",
                ""
            ],
            "iniunvalorSimple"=>[
                'coverage,debug',
                "./tmp/iniconfigSimpleValuetest.ini",
                "debug"
            ]
        ];
    }



    /**
     * @dataProvider DPtest_iniconfig_parse1
     */
    public function test_iniconfig_parse1($esperado, $filename, $name){
        if ($esperado="") 
            $this->expectException('Unable to parse the INI string:'."Need ini content to parse.");
        $iniConfig = new iniConfig($filename);
        $this->assertEquals($esperado,$iniConfig->readVars($name));
    }
}