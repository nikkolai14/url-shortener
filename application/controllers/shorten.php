<?php

class Shorten extends CI_Controller {
	private $page_data = array();

	function __construct() {
		parent::__construct();
		$this->load->model('shorten_model');
	}

	public function index() {
		$this->page_data['short_code'] = ($this->session->flashdata('short_code') !== NULL) ? $this->session->flashdata('short_code') :
			'';
		$this->load->view('home', $this->page_data);
	}

	public function save_url() {
		$this->form_validation->set_rules('url', 'URL', 'required|valid_url');
		
		if ($this->form_validation->run() == FALSE) {
            redirect('shorten/index');
        } else {
        	$short_code = $this->shorten_model->save_url();
        	$this->session->set_flashdata('short_code', $short_code);
        	redirect('shorten/index');
        }
	}

	public function get_url() {
		$short_code = $this->uri->segment(1);

		// check the short code in to the database
		$long_url = $this->shorten_model->get_url($short_code);

		if ($long_url) {
			header('Location: ' . $long_url);
			exit;	
		} else {
			redirect('shorten/error_code');
		}
	}

	public function error_code() {
		$this->load->view('invalid_code');
	}
}
