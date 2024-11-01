<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper('url');

        if (!in_array($this->session->userdata('username'), ['syahrul', 'daulay', 'toni'])) {
            $this->session->set_flashdata('error', 'Access denied. You do not have permission to view this page.');
            redirect('admin'); 
        }
}

    // Display all users
    public function index() {
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('template/header');
        $this->load->view('user/user_list', $data);
        $this->load->view('template/footer');
    }

    // Display form to add a new user
    public function create() {
        $this->load->view('template/header');
        $this->load->view('user/user_create');
        $this->load->view('template/footer');
    }

    // Save new user to database
    public function store() {
        $data = [
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        ];
        $this->User_model->insert_user($data);
        $this->session->set_flashdata('success', 'User added successfully.');
        redirect('user');
    }

    // Display form to edit an existing user
    public function edit($id) {
        $data['user'] = $this->User_model->get_user_by_id($id);
        $this->load->view('template/header');
        $this->load->view('user/user_edit', $data);
        $this->load->view('template/footer');
    }

    // Update user details in the database
    public function update($id) {
        $data = [
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        ];

        if (empty($data['password'])) {
            unset($data['password']); // Do not update password if it’s empty
        }

        $this->User_model->update_user($id, $data);
        $this->session->set_flashdata('success', 'User updated successfully.');
        redirect('user');
    }

    // Delete user
    public function delete($id) {
        $this->User_model->delete_user($id);
        $this->session->set_flashdata('success', 'User deleted successfully.');
        redirect('user');
    }
}
