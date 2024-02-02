<?php

// MODEL

class Regisztral_Model
{

	function __construct () 
    {
        $this->$dbh = new PDO('mysql:host=localhost;dbname=cukrasz', 'cukrasz', 'kafferBIValy');
        $this->$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    }

	function register_user($password, $fname, $lname, $uname)
    {
        // Lekérjük, van-e ilyen e-mail
        $sqlSelect = "select * from felhasznalok where bejelentkezes = :uname";
        $response = $this->$dbh->prepare($sqlSelect);
        $response->execute( array( ':uname' => $uname ) );
        $result = $response->fetch();

        if (!$result)
        {
            $sqlInsert = "insert into felhasznalok ( id, csaladi_nev, utonev, bejelentkezes, jelszo) values(0, :lname, :fname, :uname, :password)";;
            $response = $this->$dbh->prepare($sqlInsert);
            $response->execute( array(':lname' => $lname, ':fname' => $fname, ':uname' => $uname, ':password' => sha1($password)) ); 

            return ($count = $response->rowCount()) ? true : false;
        }
		else return false;
    }


}

?>