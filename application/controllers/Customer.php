<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('Customer_model');
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('customer_model');
            $this->load->library('pagination');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }    

public function index() {
    // Get the search query if available
    $search = $this->input->get('search');

    // Pagination configuration
    $config = [
        'base_url' => base_url('customer/index'),
        'total_rows' => $this->Customer_model->count_customer_groups($search),
        'per_page' => 5,
        'page_query_string' => TRUE,
        'query_string_segment' => 'page',
        'reuse_query_string' => TRUE,
        'full_tag_open' => '<nav><ul class="pagination justify-content-center">',
        'full_tag_close' => '</ul></nav>',
        'first_tag_open' => '<li class="page-item">',
        'first_tag_close' => '</li>',
        'last_tag_open' => '<li class="page-item">',
        'last_tag_close' => '</li>',
        'next_tag_open' => '<li class="page-item">',
        'next_tag_close' => '</li>',
        'prev_tag_open' => '<li class="page-item">',
        'prev_tag_close' => '</li>',
        'cur_tag_open' => '<li class="page-item active"><a href="#" class="page-link">',
        'cur_tag_close' => '</a></li>',
        'num_tag_open' => '<li class="page-item">',
        'num_tag_close' => '</li>',
        'attributes' => ['class' => 'page-link']
    ];
    
    $this->pagination->initialize($config);

    // Get the page number
    $page = $this->input->get('page');
    $page = ($page) ? $page : 0;

    // Fetch customer groups with search and pagination
    $data['customer_groups'] = $this->Customer_model->get_customer_groups($config['per_page'], $page, $search);
    $data['pagination'] = $this->pagination->create_links();
    $data['search'] = $search;

    $this->load->view('template/header');
    $this->load->view('customer/customer_group_list', $data);
    $this->load->view('template/footer');
}


    
        // Display customers within a group
        public function group_details($group_id) {
            $data['customers'] = $this->Customer_model->get_customers_by_group($group_id);
            $data['group_id'] = $group_id;
            $this->load->view('template/header');
            $this->load->view('customer/group_details', $data);
            $this->load->view('template/footer');
        }
    
        public function add_customer($group_id = null) {
            // Check if group_id is valid; if not, redirect or show error
            if (!$group_id || !is_numeric($group_id)) {
                $this->session->set_flashdata('error', 'Invalid group ID specified.');
                redirect('customer/index'); // Redirect to customer list or another relevant page
                return;
            }
        
            // Proceed if group_id is valid
            $data['suppliers'] = $this->Customer_model->get_all_suppliers();
            $data['service_types'] = $this->Customer_model->get_all_service_types();
            $data['group_id'] = $group_id;
        
            $this->load->view('template/header');
            $this->load->view('customer/add_customer', $data);
            $this->load->view('template/footer');
        }
        
    
        // Handle customer addition with file upload
        public function store_customer() {
            $data = [
                'customer' => $this->input->post('customer'),
                'customer_group_id' => $this->input->post('group_id'),
                'kdsupplier' => $this->input->post('kdsupplier'),
                'cid_supp' => $this->input->post('cid_supp'),
                'no_so' => $this->upload_file('no_so'), // Upload file for no_so
                'no_sdn' => $this->upload_file('no_sdn'), // Upload file for no_sdn
                'service_type_id' => $this->input->post('service_type_id')
            ];
        
            if ($data['no_so'] && $data['no_sdn']) { // Ensure both files are uploaded successfully
                $this->Customer_model->insert_customer($data);
                $this->session->set_flashdata('success', 'Customer added successfully.');
            } else {
                $this->session->set_flashdata('error', 'File upload failed for one or both files.');
            }
            redirect('customer/group_details/' . $data['customer_group_id']);
        }        
    
        // File upload helper function
        private function do_upload($field_name) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 2048; // 2MB
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload($field_name)) {
                return $this->upload->data('file_name');
            } else {
                return false;
            }
        }
        private function upload_file($field_name) {
            // Define upload configurations
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 2048; // Limit to 2MB
        
            $this->load->library('upload', $config);
        
            if ($this->upload->do_upload($field_name)) {
                return $this->upload->data('file_name');
            } else {
                // Handle upload error
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', "File upload failed: " . $error);
                redirect('customer/add_customer');
                return null;
            }
        }
        
    }
    