<?php
if (!defined('_PS_VERSION_'))
	exit;

class IlluminatoComments extends Illuminato\Module {
	public function __construct() {
		//Instead of giving the name, just give the _FILE_ so we can automatically check if the filename,
		//the directory and the name are the same
		$this->file = __FILE__;
		$this->tab = 'front_office_features';
		$this->version = '0.1';
		$this->author = 'Fabien Serny';
		//bootstrap option is already set to true
		//and prestashop version requirement is set to 1.6 min
		parent::__construct();
		$this->displayName = $this->l('My Module of product comments');
		$this->description = $this->l('With this module, your customers will be able to grade and comments your products.');
	}
}