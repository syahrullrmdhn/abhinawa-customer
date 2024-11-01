<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model {

    public function get_global_search_results($user) {
        if (empty($user)) {
            return [];
        }
    
        // Search in customer_groups, customers, and suppliers
        $this->db->select('customer_groups.id AS group_id, customer_groups.group_name, customers.customer, suppliers.kdsupplier, suppliers.cidsupplier, suppliers.nama_supplier');
        $this->db->from('customer_groups');
        $this->db->join('customers', 'customers.customer_group_id = customer_groups.id', 'left');
        $this->db->join('suppliers', 'customers.kdsupplier = suppliers.kdsupplier', 'left');
        $this->db->group_start();
        $this->db->like('customer_groups.group_name', $user, 'both', FALSE); // Escape for SQL safely
        $this->db->or_like('customers.customer', $user, 'both', FALSE);
        $this->db->or_like('suppliers.cidsupplier', $user, 'both', FALSE);
        $this->db->or_like('suppliers.nama_supplier', $user, 'both', FALSE);
        $this->db->group_end();
        
        return $this->db->get()->result();
    }
    
}
