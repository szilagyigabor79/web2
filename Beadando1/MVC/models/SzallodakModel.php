<?php

class SzallodakModel
{

    function __construct()
    
    {
        $this->$dbh = new PDO('mysql:host=localhost;dbname=utazas', 'utazas', 'kafferBIValy',
        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $this->$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    }


    function getResorts()
    {
        $sqlSelect = "select nev, besorolas, repter_tav from szalloda";
        $response = $this->$dbh->prepare($sqlSelect);
        $response->execute();
        $result = $response->fetchAll();

        return $result;
    }
}


?>