<?php

$url = "http://localhost/Beadando2/Rest/szerver.php";
$result = "";
if(isset($_POST['id']))
{

  // POST
  // Ha nincs id és megadtak minden adatot, akkor beszúrás
  if($_POST['id'] == "" && $_POST['nev'] != "" && $_POST['tipus'] != "" && $_POST['dijazott'] != "")
  {
      $data = Array("nev" => $_POST["nev"], "tipus" => $_POST["tipus"], "dijazott" => $_POST["dijazott"]);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
  }
  
  // HIÁNY
  // Ha nincs id de nem adtak meg minden adatot
  elseif($_POST['id'] == "")
  {
    $result = "Hiba: Hiányos adatok!";
  }
  
  // PUT
  // Ha van id, amely >= 1, és megadták legalább az egyik adatot, akkor módosítás
  elseif($_POST['id'] >= 1 && ($_POST['nev'] != "" || $_POST['tipus'] != "" || $_POST['dijazott'] != ""))
  {
      $data = Array("id" => $_POST["id"], "nev" => $_POST["nev"], "tipus" => $_POST["tipus"], "dijazott" => $_POST["dijazott"]);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
  }
  
  // DELETE
  // Ha van id, amely >=1, de nem adtak meg legalább az egyik adatot
  elseif($_POST['id'] >= 1)
  {
      $data = Array("id" => $_POST["id"]);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
  }
  
  // HIBÁS ID
  // Ha van id, de rossz az id, akkor a hiba kiírása
  else
  {
    echo "Hiba: Rossz azonosító (Id): ".$_POST['id']."<br>";
  }
}

// GET
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$tabla = curl_exec($ch);
curl_close($ch);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Süti admin</title>
</head>
<body>
    
    <br>
    
    <h2 style="text-align: center">Módosítás / Beszúrás</h2>

    <form style="text-align: center;" method="post">
    <input style="width: 20%" placeholder="Id" type="number" name="id"><br>
    <input style="width: 20%" placeholder="Név" type="text" name="nev" maxlength="45"><br>
    <input style="width: 20%" placeholder="Típus" type="text" name="tipus" maxlength="45"><br>
    <input style="width: 20%" placeholder="Díjazott" type="number" name="dijazott" maxlength="45"> <br>
    
    <input type="submit" value = "Küldés">
    </form>

    <?= $result ?>
    <h4>Jelenleg az alábbi termékek szerepelnek adatbázisunkban:</h4>
    <?= $tabla ?>



</body>
</html>
