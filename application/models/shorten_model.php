<?php

class Shorten_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->helper('string');
	}

	public function save_url() {
		// create a random short code
		// and check if it exist in the database
		// and if it does, create a new code until it generates a unique code
		do {
			$short_code = random_string('alnum', 5);

			$query = "SELECT * FROM urls WHERE short_url = ?";
			$result = $this->db->query($query, array($short_code));
			$numRows = $this->db->count_all_results();

		} while($numRows > 1);

		$sql = "INSERT INTO urls VALUES (?, ?, ?)";
		$result = $this->db->query($sql, array('', $this->input->post('url'), $short_code));

		return ($result) ? $short_code : false ;
	}

	public function get_url($short_code) {
		$sql = "SELECT * FROM urls WHERE short_url = ?";
		$query = $this->db->query($sql, array($short_code));
		$result = $query->row();

		return ($result) ? $result->long_url : false;
	}
}