<?php

require '../models/SzallodakModel.php';
require '../views/SzallodakView.php';
require '../../template.php';
loadTemplate();


class SzallodakController
{
    function __construct ( )
    {

        $szallodakModel = new SzallodakModel;
        $resorts = $szallodakModel->getResorts();
            
        $szallodakView = new VelemenyekView( $resorts );

        
    }

    
}
$szallodakController = new SzallodakController( );

?>