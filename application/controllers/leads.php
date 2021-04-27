<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Lead");
	}
	public function index_html() {
		$data["leads"] = $this->Lead->all();
		$this->load->view("partials/leads", $data);
	}
	public function index() {
		$data["counts"] = $this->Lead->pagination();
		$this->load->view('main/index',$data);
	}
	public function search(){
		$data['leads'] = $this->Lead->search($this->input->post());
		$this->load->view("partials/leads", $data);
	}
}
