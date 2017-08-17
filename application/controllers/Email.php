<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function __construct() {
        parent::__construct();
        ensureLoggedIn();
    }

    public function index() {
        $this->load->view('email_editor');
    }

    public function save() {
        dd($this->input->post());
    }

}