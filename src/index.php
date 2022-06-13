<?php
    use ITEC\DAW\PROG\CONFIGFILE\iniConfig;
    use ITEC\DAW\PROG\CONFIGFILE\csvConfig;
    use ITEC\DAW\PROG\CONFIGFILE\yamlConfig;
    use ITEC\DAW\PROG\CONFIGFILE\iconfig;
    include "vendor/autoload.php";

    $ini = new iniConfig("tmp/index.ini");
    $csv = new csvConfig("tmp/index.csv");
    $yml = new yamlConfig("tmp/index.yml");

    configure("background","black",$ini);
    configure("background","black",$csv);
    configure("background","black",$yml);

    function configure($name, $value, iConfig $configurador){
        $configurador->addVars($name,$value);
    }




    