<?php

//alkalmaz�s gy�k�r k�nyvt�ra a szerveren
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/Beadando2/');

//URL c�m az alkalmaz�s gy�ker�hez
 define('SITE_ROOT', 'http://localhost/Beadando2/');

// a router.php vez�rl� bet�lt�se
 require_once(SERVER_ROOT . 'controllers/' . 'router.php');

?>