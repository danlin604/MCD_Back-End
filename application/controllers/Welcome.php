<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends Application {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Stock');
		$this->data['pagetitle'] = 'stock status.. (Server backend)';
	}
	/**
	 * Sets up the form and renders it.
	 */
	function index()
	{
		$this->load->helper('formfields');
		$this->data['title'] = 'dan norm manu (Server)';
		$this->data['pagebody'] = 'welcome_message';
		$this->render();
	}
}