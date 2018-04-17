<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/php/koolreport/autoload.php";

use \koolreport\processes\Group;
use \koolreport\processes\Sort;
use \koolreport\processes\Limit;

class acessosLog extends \koolreport\KoolReport
{
    public function settings()
    {
        return array(
            "dataSources"=>array(
                "acessos"=>array(
                    "connectionString"=>"mysql:host=" . SERVERNAME . ";dbname=" . DB,
                    "username"=>USERNAME,
                    "password"=>PASSWORD,
                    "charset"=>"utf8"
                ),
                "array_data"=>array(
                    "class"=>'\koolreport\datasources\ArrayDataSource',
                    "dataFormat"=>"table",
                    "data"=>array(
                        array("customerName","dollar_sales"),
                        array("Johny Deep",100),
                        array("Angelina Jolie",200),
                        array("Brad Pitt",200),
                        array("Nocole Kidman",100),
                    )
                )
            )
        );
    }

    public function setup()
    {
        $this->src('acessos')
        ->query("SELECT id,host,path FROM access_log")
        ->pipe(new Group(array(
            "by"=>"id",
            "sum"=>"path"
        )))
        ->pipe(new Sort(array(
            "host"=>"desc"
        )))
        ->pipe(new Limit(array(10)))
        ->pipe($this->dataStore('acessos'));
    }
}