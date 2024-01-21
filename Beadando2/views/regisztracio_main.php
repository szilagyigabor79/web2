<br><br><br>
<h2 style="text-align: center">Regisztráció</h2><br>


<form action="<?= SITE_ROOT ?>regisztral" method="post" style="text-align: center; margin: auto">

    <input type="text" name="csaladi_nev" id="csaladi_nev" placeholder="Családi név"><br>
    <input type="text" name="utonev" id="utonev" placeholder="Keresztnév"><br>
    <input type="text" name="bejelentkezes" id="bejelentkezes" placeholder="Login név"><br>
    <input type="password" name="jelszo" id="jelszo" required pattern="[\-\.a-zA-Z0-9_]{4}[\-\.a-zA-Z0-9_]+" placeholder="Jelszó"><br><br>
    <input type="submit" value="Regisztrál">

</form>
<h2><br><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?><br></h2>
