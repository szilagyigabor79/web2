<?php


function listCakes($dbresult)
{
    if (!$dbresult)
    {
    echo "Ilyen termékünk sajnos nincsen! Van viszont pl. kilós édes teasüteményünk, ami tojásmentes!";
    return;
    };

    echo 
    '
    <table class="table table-striped table-dark">
    <thead>
        <th>Név</th>
        <th>Ár</th>
        <th>Típus</th>
    </thead>
    <tbody>
    ';

    foreach ($dbresult as $suti)
    {
        echo "<tr>";
        echo "<td>".$suti["nev"]."</td>";
        echo "<td>".$suti["ertek"]."</td>";
        echo "<td>".$suti["tipus"]."</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
}

$dbh = new PDO('mysql:host=localhost;dbname=hiz8n9', 'root', '');
$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
$sqlSelect = "select * from ar inner join suti on ar.sutiid = suti.id inner join tartalom ON suti.id = tartalom.sutiid where egyseg = :egyseg and tipus = :tipus and mentes = :mentes";
$response = $dbh->prepare($sqlSelect);
$response->execute( array( ':egyseg' => $_GET["egyseg"], ':tipus' => $_GET["tipus"], ':mentes' => $_GET["mentes"] ) );
$result = $response->fetchAll();
 
listCakes($result);


?>