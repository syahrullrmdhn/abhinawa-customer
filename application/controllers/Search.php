<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Search_model');
    }

public function index() {
    $user = $this->input->get('user', TRUE); // Automatically applies XSS filtering
    $data['user'] = html_escape($user); // Additional XSS protection for displaying in the view

    // Pass the sanitized input to the model
    $data['results'] = $this->Search_model->get_global_search_results($this->db->escape_like_str($user));

    $this->load->view('template/header');
    $this->load->view('search/global_search_form', $data);
    $this->load->view('search/global_search_results', $data);
    $this->load->view('template/footer');
}

}