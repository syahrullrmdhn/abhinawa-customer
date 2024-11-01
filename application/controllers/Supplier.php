<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class supplier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('supplier_model');
    }

    // Display all suppliers
    public function index() {
        $data['suppliers'] = $this->supplier_model->get_all_suppliers();
        $this->load->view('template/header');
        $this->load->view('supplier/supplier_list', $data);
        $this->load->view('template/footer');
    }

    // Display form to add a new supplier
    public function create() {
        $this->load->view('template/header');
        $this->load->view('supplier/supplier_create');
        $this->load->view('template/footer');
    }

    // Save new supplier to database
    public function store() {
        $data = [
            'kdsupplier' => $this->input->post('kdsupplier'),
            'nama_supplier' => $this->input->post('nama_supplier'),
            'cidsupplier' => $this->input->post('cidsupplier'),
            'start_service' => $this->input->post('start_service'),
            'end_service' => $this->input->post('end_service')
        ];
        $this->supplier_model->insert_supplier($data);
        $this->session->set_flashdata('success', 'Supplier added successfully.');
        redirect('supplier');
    }

    // Display form to edit an existing supplier
    public function edit($id) {
        $data['supplier'] = $this->supplier_model->get_supplier_by_id($id);
        $this->load->view('template/header');
        $this->load->view('supplier/supplier_edit', $data);
        $this->load->view('template/footer');
    }

    // Update supplier details in the database
    public function update($id) {
        $data = [
            'kdsupplier' => $this->input->post('kdsupplier'),
            'nama_supplier' => $this->input->post('nama_supplier'),
            'cidsupplier' => $this->input->post('cidsupplier'),
            'start_service' => $this->input->post('start_service'),
            'end_service' => $this->input->post('end_service')
        ];
        $this->supplier_model->update_supplier($id, $data);
        $this->session->set_flashdata('success', 'Supplier updated successfully.');
        redirect('supplier');
    }

    // Delete supplier
    public function delete($id) {
        $this->supplier_model->delete_supplier($id);
        $this->session->set_flashdata('success', 'Supplier deleted successfully.');
        redirect('supplier');
    }
    public function view_suppliers() {
        // Cek apakah pengguna sudah login dan memiliki role_id 1, 2, atau 3
        $allowed_roles = [1, 2, 3]; // Role yang diizinkan
        if (!$this->session->userdata('logged_in') || !in_array($this->session->userdata('role_id'), $allowed_roles)) {
            // Jika pengguna tidak memiliki akses, redirect ke halaman login atau halaman utama
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses ke halaman ini.');
            redirect('auth'); // Sesuaikan dengan halaman login atau dashboard yang sesuai
        }
    
        // Jika pengguna memiliki akses, tampilkan daftar supplier
        $data['suppliers'] = $this->supplier_model->get_all_suppliers();
        $data['title'] = 'Supplier List (Read-Only)';
        
        $this->load->view('template/header', $data);
        $this->load->view('supplier/supplier_list_user', $data); // View read-only
        $this->load->view('template/footer');
    }
    
}
