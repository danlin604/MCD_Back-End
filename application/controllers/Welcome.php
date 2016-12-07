<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends Application {
	function __construct()
	{
		parent::__construct();
		$this->load->model('supplies');
		$this->data['pagetitle'] = '(Server backend) Stock';
	}
	/**
	 * Sets up the form and renders it.
	 */
	function index()
	{
		$this->load->helper('formfields');
		$this->data['title'] = 'dan norm manu backend(server)';
		$this->data['pagebody'] = 'Welcome_message';
		
		$this->render();
	}
}