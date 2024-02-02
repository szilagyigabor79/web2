<?php

$eredmeny = "";
try {
	$dbh = new PDO('mysql:host=localhost;dbname=cukrasz', 'cukrasz', 'kafferBIValy',
				  array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
	switch($_SERVER['REQUEST_METHOD']) {
		case "GET":
				$sql = "SELECT * FROM suti";     
				$sth = $dbh->query($sql);
				$eredmeny .= '<table class="table table-striped table-dark">
				<tr>
					<th>Id</th>
					<th>Név</th>
					<th>Típus</th>
					<th>Díjazott</th>
				</tr>';
				while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
					$eredmeny .= "<tr>";
					foreach($row as $column)
						$eredmeny .= "<td style=\"border: 1px solid black; padding: 3px;\">".$column."</td>";
					$eredmeny .= "</tr>";
				}
				$eredmeny .= "</table>";
			break;

		case "POST":
				$sql = "insert into suti values (0, :nev, :tipus, :dijazott)";
				$sth = $dbh->prepare($sql);
				$count = $sth->execute(Array(":nev"=>$_POST["nev"], ":tipus"=>$_POST["tipus"], ":dijazott"=>$_POST["dijazott"]));
				$newid = $dbh->lastInsertId();
				$eredmeny .= $count." beszúrt sor: ".$newid;
			break;

		case "PUT":
				$data = array();
				$incoming = file_get_contents("php://input");
				parse_str($incoming, $data);
				$modositando = "id=id"; $params = Array(":id"=>$data["id"]);
				if($data['nev'] != "") {$modositando .= ", nev = :nev"; $params[":nev"] = $data["nev"];}
				if($data['tipus'] != "") {$modositando .= ", tipus = :tipus"; $params[":tipus"] = $data["tipus"];}
				if($data['dijazott'] != "") {$modositando .= ", dijazott = :dijazott"; $params[":dijazott"] = $data["dijazott"];}
				$sql = "update suti set ".$modositando." where id=:id";
				$sth = $dbh->prepare($sql);
				$count = $sth->execute($params);
				$eredmeny .= $count." módositott sor. Azonosítója:".$data["id"];
			break;

		case "DELETE":
				$data = array();
				$incoming = file_get_contents("php://input");
				parse_str($incoming, $data);
				$sql = "delete from suti where id=:id";
				$sth = $dbh->prepare($sql);
				$count = $sth->execute(Array(":id" => $data["id"]));
				$eredmeny .= $count." sor törölve. Azonosítója:".$data["id"];
			break;
	}
}
catch (PDOException $e) {
	$eredmeny = $e->getMessage();
}
echo $eredmeny;

?>