<?php

class Sutik_Controller
{
	public $baseName = 'sutik';
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName."_main");
	}
}

?>