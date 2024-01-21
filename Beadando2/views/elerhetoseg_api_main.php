<h2>Értékelje szolgáltatásunkat!</h2>

<?php

// GET
$ch = curl_init('https://jsonplaceholder.typicode.com/posts/100');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$tabla = curl_exec($ch);
curl_close($ch);

$decode = json_decode($tabla);

echo '<h4>Legfrisebb értékelésünk:</h4>';
echo 
'
<table class="table table-striped table-dark">
    <thead>
        <tr>
        <th>Azonosító</th>
        <th>Cím</th>
        <th>Értékelés</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>'.$decode->id.'</td>
        <td>'.$decode->title.'</td>
        <td>'.$decode->body.'</td>
    </tr>
    </tbody>
</table>
';


if( isset($_POST['id']) && $_POST['title'] != "" && $_POST['body'] != "" && $_POST['userid'] != "" )
  {
      $data = Array("id" => $_POST["id"], "title" => $_POST["title"], "body" => $_POST["body"], "userid" => $_POST["userid"]);
      $ch = curl_init('https://jsonplaceholder.typicode.com/posts');
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);

      if ($result)
      {
          echo "Sikeresen elküldte a következő adatokat: ".$result;
      }
  }

  elseif( isset($_POST['id']) && $_POST['id'] >= 1 && ($_POST['title'] != "" || $_POST['body'] != "" || $_POST['userid'] != "") )
  {
      $data = Array("id" => $_POST["id"], "title" => $_POST["title"], "body" => $_POST["body"], "userid" => $_POST["userid"]);
      $ch = curl_init('https://jsonplaceholder.typicode.com/posts/'.$_POST['id']);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);

      if ($result)
      {
          echo "Sikeresen módosította az alábbi adatokat: ".$result;
      }
  }
  elseif(isset($_POST['id']) && $_POST['id'] != "" && $_POST['title'] == "" && $_POST['body'] == "" && $_POST['userid'] == "" )
  {
      $data = Array("id" => $_POST["id"]);
      $ch = curl_init('https://jsonplaceholder.typicode.com/posts/'.$_POST['id']);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);

      if ($result)
      {
          echo "Sikeresen törölte az ".$_POST['id']."-es azonosítóhoz tartozó értékelést!";
      }
  }





?>

<!-- POST -->
<h4 style="text-align: center;">Értékelje szolgáltatásunkat!</h4>
<form style="text-align: center;" method="post">
    <input style="width: 20%" placeholder="Azonosító" type="text" name="id"><br>
    <input style="width: 20%" placeholder="Cím" type="text" name="title" maxlength="45"><br>
    <input style="width: 20%" placeholder="Szöveg" type="text" name="body" maxlength="45"><br>
    <input style="width: 20%" placeholder="UserId" type="text" name="userid" maxlength="45"> <br>

    <input type="submit" value = "Küldés">
</form>








