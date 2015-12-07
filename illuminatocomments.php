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

	public function getContent()
	{
		if(Input::get('illuminatocomments_conf'))
		{
			$this->conf->set(['GRADE' => Input::has('enable_grades')]);
			$this->conf->set(['COMMENTS' => Input::has('enable_comments')]);
		}
		$html = Form::open(['id' => 'illuminatocomments_form', 'enctype' => 'multipart/form-data', 'url' => URL::full()]);
		$html .= Form::label('enable_grades', 'Enable grades');
		$html .= Form::checkbox('enable_grades', '1', $this->conf->get('GRADE'));
		$html .= Form::label('enable_comments', 'Enable comments');
		$html .= Form::checkbox('enable_comments', '1', $this->conf->get('COMMENTS'));
		$html .= Form::submit('Save', ['name' => 'illuminatocomments_conf', 'id' => 'illuminatocomments_conf']);
		$html .= Form::close();
		return $html;
	}
}