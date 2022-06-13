<?php
use PHPUnit\Framework\TestCase;
use ITEC\DAW\PROG\CONFIGFILE\csvConfig;

class csvconfigTest extends TestCase{
    public function test_csv_config_file_exists(){
        $csvConfig = new csvConfig('tmp/csvconfigTest.csv');
        $this->assertFileExists('tmp/csvconfigTest.csv');
        $csvConfig->removeFile();
        $this->assertTrue(!file_exists('tmp/iniconfigTest.csv'));
    }

    public function DPtest_iniconfig_parse1(){
        return [
            "csvunvalorSimple"=>[
                'coverage',
                "./tmp/csvconfigSimpleValuetest.csv",
                "debug"
            ],
            "csvvacio"=>[
                "",
                "./tmp/csvconfigtest.csv",
                ""
            ]
        ];
    }



    /**
     * @dataProvider DPtest_iniconfig_parse1
     */
    public function test_csvconfig_parse1($esperado, $filename, $name){
        $csvConfig = new csvConfig($filename);
        $this->assertEquals($esperado,$csvConfig->readVars($name));
    }
}