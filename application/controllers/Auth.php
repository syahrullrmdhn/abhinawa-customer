<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session'); 
        $this->load->helper('url');
        $this->load->model('auth_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('admin');
        }
        $this->load->view('auth/login');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password')); // Use MD5 for password hashing
        $user = $this->auth_model->check_user($username, $password);
    
        if ($user) {
            $session_data = [
                'username' => $user->username,
                'logged_in' => true
            ];
            $this->session->set_userdata($session_data);
            redirect('admin');
        } else {
            $this->session->set_flashdata('login_error', 'Username atau password salah.');
            redirect('auth');
        }
    }
    public function change_password() {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth'); // Redirect to login if not logged in
        }
        $this->load->view('template/header');
        $this->load->view('auth/change_password');
        $this->load->view('template/footer');
    }
    // Handle password update
    public function update_password() {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth'); // Redirect to login if not logged in
        }

        $username = $this->session->userdata('username');
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        // Check if new password and confirm password match
        if ($new_password !== $confirm_password) {
            $this->session->set_flashdata('error', 'New password and confirm password do not match.');
            redirect('auth/change_password');
        }

        // Verify the old password
        $user = $this->auth_model->check_user($username, md5($old_password));
        if (!$user) {
            $this->session->set_flashdata('error', 'Old password is incorrect.');
            redirect('auth/change_password');
        }

        // Update the password if old password is correct
        $this->user_model->update_password($user->id, md5($new_password));
        $this->session->set_flashdata('success', 'Password changed successfully.');
        redirect('auth/change_password');
    }
    
    public function logout() {
        $this->session->unset_userdata(['username', 'logged_in']);
        $this->session->sess_destroy();
        redirect('auth');
    }
}
