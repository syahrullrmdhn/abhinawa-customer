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
}
