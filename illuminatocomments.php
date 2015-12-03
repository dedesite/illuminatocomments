<?php
require 'models/comments.php';

if (!defined('_PS_VERSION_'))
	exit;

class IlluminatoComments extends Illuminato\Module {

	public function install()
	{
		// Call install parent method
		if (!parent::install())
			return false;
		$this->conf->set(['GRADE' => '1', 'COMMENTS' => '1']);

		return true;
	}


	public function hookDisplayProductTabContent($params)
	{
		$comment = new IlluminatoComments\Comments();
		return view('comments::display');
	}
}