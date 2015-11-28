<?php
require 'models/comments.php';

if (!defined('_PS_VERSION_'))
	exit;

class IlluminatoComments extends Illuminato\Module {
	public function hookDisplayProductTabContent($params)
	{
		$comment = new IlluminatoComments\Comments();
		return view('display');
	}
}