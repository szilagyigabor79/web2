<br><br><br>
<h2 style="text-align: center">Belépés</h2>
<form action="<?= SITE_ROOT ?>beleptet" method="post" style="text-align: center; margin: auto">
    <input placeholder="Login név" type="text" name="login" id="login" required pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3}[\-\.a-zA-Z0-9_]+"><br>
    <input placeholder="Jelszó" type="password" name="password" id="password" required pattern="[\-\.a-zA-Z0-9_]{4}[\-\.a-zA-Z0-9_]+"><br>
    <input type="submit" value="Belépés">
</form>
<h2><br><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?><br></h2>
