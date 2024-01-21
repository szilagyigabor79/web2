<br>
<br>
<h2>Keressen termékeinkre! Válasszon az alábbi opciók közül!</h2>

<form action=""> 

  <select name="egyseg" id="egyseg" onchange="myCakes.showCakes()">
    <option value="">Milyen kiszerelésben legyen a süti?</option>
    <option value="db">db</option>
    <option value="kg">kg</option>
    <option value="8 szeletes">8 szeletes</option>
    <option value="16 szeletes">16 szeletes</option>
    <option value="24 szeletes">24 szeletes</option>
  </select>

  <select name="tipus" id="tipus" onchange="myCakes.showCakes()">
    <option value="">Milyen típusú sütit keres?</option>
    <option value="sós teasütemény">sós teasütemény</option>
    <option value="édes teasütemény">édes teasütemény</option>
    <option value="bejgli">bejgli</option>
    <option value="torta">torta</option>
    <option value="tortaszelet">tortaszelet</option>
    <option value="pite">pite</option>
  </select>

  <select name="mentes" id="mentes" onchange="myCakes.showCakes()">
    <option value="">Mitől legyen mentes a süti?</option>
    <option value="G">Glutén</option>
    <option value="L">Liszt</option>
    <option value="To">Tojás</option>
    <option value="Te">Tej</option>
  </select>

</form>
<br>
<div id="txtHint">Az eredményeket itt fogja látni, feltéve, hogy van olyan termékünk, amilyet keres...</div>


<script>

function CakeHandler() {}

CakeHandler.prototype.showCakes = function () {
  var egyseg = document.getElementById("egyseg").value;
  var tipus = document.getElementById("tipus").value;
  var mentes = document.getElementById("mentes").value;

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("txtHint").innerHTML = this.responseText;
  }

  xhttp.open("GET", "./Ajax/getcakes.php?egyseg="+egyseg+"&tipus="+tipus+"&mentes="+mentes);
  xhttp.send();

}

myCakes = new CakeHandler();



</script>