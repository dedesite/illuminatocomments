<?php
if (!defined('_PS_VERSION_'))
	exit;

class IlluminatoComments extends Illuminato\Module {
	public function __construct() {
		//Needed cause parent class retrieve filename with debug_backtrace
		parent::__construct();
	}
}

//Artisan::call('migrate');//->run('path/to/migrations');