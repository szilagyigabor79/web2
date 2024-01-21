<?php

// CONTROLLER
class Regisztral_Controller
{
	public $baseName = 'regisztral';
	public function main(array $vars)
	{
		$regModel = new Regisztral_Model();
		$reg_success = $regModel->register_user($_POST["jelszo"], $_POST["utonev"], $_POST["csaladi_nev"], $_POST["bejelentkezes"]);

		$view = new View_Loader($this->baseName.'_main');
		$view->assign("siker", $reg_success);
	}
}
?>