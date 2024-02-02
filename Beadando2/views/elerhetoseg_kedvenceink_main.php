<html lang="en">
<head>
<meta charset="utf-8"/>
</head>


<h2 style="text-align: center">
    <br><br><br>Kedvenceink
</h2>

<br><br>

<h4 style="text-align: center">Rigójancsi</h4>
<p style="text-align: justify; width: 80%; margin:auto">
A rigójancsi egy hagyományos magyar, általában kocka alakú, csokoládéspiskótatészta- és csokoládékrém-alapú cukrászsütemény. A nevét Rigó Jancsi (1858–1927) híres magyar cigányprímásról kapta, aki elcsábította és feleségül vette Clara Ward, Caramane-Chimay hercegnőt, az amerikai milliomos E. B. Ward egyetlen lányát, aki Joseph Caraman-Chimay belga herceg felesége volt.
</p>
<br>

<h4 style="text-align: center">Bledi krémes</h4>
<p style="text-align: justify; width: 80%; margin:auto">A bledi krémes (szlovén neve blejska kremšnita) Bled városának és Szlovéniának is a szimbóluma, melyet Bled lakosai és az odalátogató turisták is rendszeresen fogyasztanak. 1953-ban a Park szálloda cukrászatában készítette először a magyar származású Ištvan Lukačevič (Lukacsevics István), és a szállodával szembeni kávézóban jelenleg is kapható.
</p>
<br>

<h4 style="text-align: center">Sacher torta</h4>
<p style="text-align: justify; width: 80%; margin:auto">A Sacher-torta az osztrák gasztronómia és Bécs városának egyik legismertebb süteménye. Egyfajta csokoládétorta, amely két réteg sűrű, nem túl édes csokoládés piskótatésztából és a közöttük lévő vékony réteg sárgabaracklekvárból áll. A tetejét és az oldalát csokoládébevonat borítja. A híres monarchiabeli cukrászkülönlegességek egyike. Korabeli nevezetes sütemények még a dobostorta és az Esterházy-torta.</p>
<br>



<canvas id="myChart" width="600" height="400" style="margin: auto"></canvas>

<?php
$dbh = new PDO('mysql:host=localhost;dbname=cukrasz', 'cukrasz', 'kafferBIValy', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
$sqlSelect = "select nev, ertek from suti inner join ar on suti.id = ar.sutiid limit 10";
$response = $dbh->prepare($sqlSelect);
$response->execute(array() );
$result = $response->fetchAll();

$sutik = array();
$arak = array();

foreach ($result as $r)
{
    array_push($sutik, $r[0]);
    array_push($arak, $r[1]);
}

?>

<script type='text/javascript'>

var sutik =<?php echo json_encode($sutik);?>;
var arak =<?php echo json_encode($arak);?>;

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="jscript/graph.js"></script>

<script>

var chartData = arak;
var list = sutik;
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: list,
        datasets: [{
            label: 'Ár',
            data: chartData,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: false,
        scaleShowValues: true,
        scales: {
            yAxes: [{
            ticks: {
                beginAtZero: true
            }
            }],
            xAxes: [{
            ticks: {
                autoSkip: false
            }
            }]
        }
        }
        });
</script>
