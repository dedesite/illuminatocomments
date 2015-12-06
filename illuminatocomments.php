<?php
require 'models/comments.php';

if (!defined('_PS_VERSION_'))
	exit;

class IlluminatoComments extends Illuminato\Module {

	public function moduleDetails()
	{
		return [
			'tab' => 'front_office_features',
			'version' => '0.3',
			'author' => 'Andréas Livet',
			// Namespace use for localisation, config and views
			'namespace' => 'comments',
			// Note that we use Laravel's localization key system for localization
			'displayName' => 'comments::module.name',
			'description' => 'comments::module.description',
		];
	}

	public function install()
	{
		// Call install parent method
		if (!parent::install())
			return false;
		// This create prestashop config value with the ILLUMINATOCOMMENT_ prefix
		$this->conf->set(['GRADE' => '1', 'COMMENTS' => '1']);

		return true;
	}


	public function hookDisplayProductTabContent($params)
	{
		$comment = new IlluminatoComments\Comments();
		return view('comments::display');
	}
}