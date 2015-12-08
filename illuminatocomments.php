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
		$this->conf->set(['GRADES' => '1', 'COMMENTS' => '1']);

		return true;
	}

	protected function processProductTabContent()
	{
		//@temp no error and no validation cause it will be done differently
		//@temp this code is just a module that actually *does* something
		if(Input::get('mymod_pc_submit_comment') !== null)
		{
			$comment = Input::only('id_product', 'firstname', 'lastname', 'email', 'grade', 'comment');
			$comment['id_shop'] = (int)$this->context->shop->id;
			IlluminatoComments\Comments::create($comment);
		}
	}

	//@temp The way hooks are handle and display will soon be changed
	public function hookDisplayProductTabContent($params)
	{
		$this->processProductTabContent();

		$this->context->controller->addCSS($this->_path.'assets/css/star-rating.css', 'all');
		$this->context->controller->addJS($this->_path.'assets/js/star-rating.js');

		$this->context->controller->addCSS($this->_path.'assets/css/illuminatocomments.css', 'all');
		$this->context->controller->addJS($this->_path.'assets/js/illuminatocomments.js');

		$enable_grades = $this->conf->get('GRADES');
		$enable_comments = $this->conf->get('COMMENTS');

		$id_product = Input::get('id_product');

		$comments = IlluminatoComments\Comments::where('id_product', '=', $id_product)->get();
		$product = new Product((int)$id_product, false, $this->context->cookie->id_lang);

		return view('comments::display', [
			'enable_grades' => $enable_grades,
			'enable_comments' => $enable_comments,
			'comments' => $comments,
			'product' => $product
			]);
	}

	public function getContent()
	{
		//@todo automate module simple configuration for Model's columns or settings (conf)
		if(Input::get('illuminatocomments_conf'))
		{
			$this->conf->set(['GRADES' => Input::has('enable_grades')]);
			$this->conf->set(['COMMENTS' => Input::has('enable_comments')]);
		}
		$html = Form::open(['id' => 'illuminatocomments_form', 'enctype' => 'multipart/form-data', 'url' => URL::full()]);
		$html .= Form::label('enable_grades', 'Enable grades');
		$html .= Form::checkbox('enable_grades', '1', $this->conf->get('GRADES'));
		$html .= Form::label('enable_comments', 'Enable comments');
		$html .= Form::checkbox('enable_comments', '1', $this->conf->get('COMMENTS'));
		$html .= Form::submit('Save', ['name' => 'illuminatocomments_conf', 'id' => 'illuminatocomments_conf']);
		$html .= Form::close();
		return $html;
	}
}