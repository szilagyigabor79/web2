<h2>Regisztráció</h2>

<!-- VIEW -->
<h2>
    <?php 
    if (isset($viewData['siker']))
        if ($viewData['siker'] == 1)
        {
            echo "Sikeres regisztráció!";
        }
        else
        {
            echo "Ez a login név már foglalt!";
        }

    ?>
</h2>
