<?php
if (!defined('_PS_VERSION_'))
	exit;

class IlluminatoComments extends Illuminato\IllModule {
	public function __construct() {
		//Needed cause parent class retrieve filename with debug_backtrace
		parent::__construct();
	}
}