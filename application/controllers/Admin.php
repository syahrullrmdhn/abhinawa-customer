<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

    public function index() {
        $this->load->view('template/header');
        $this->load->view('admin/halaman');
        $this->load->view('template/footer');
    }
}