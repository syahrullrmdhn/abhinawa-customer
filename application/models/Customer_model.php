<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer_model extends CI_Model {

    // Get all customer groups
    public function get_all_customer_groups() {
        $sql = "SELECT * FROM customer_groups";
        return $this->db->query($sql)->result();
    }

    // Get customers by group ID, with service type and supplier information
    public function get_customers_by_group($group_id) {
        $sql = "SELECT customers.*, suppliers.nama_supplier, suppliers.cidsupplier, 
                       customer_groups.group_name, service_types.service_name AS service_type_name
                FROM customers
                LEFT JOIN suppliers ON customers.kdsupplier = suppliers.kdsupplier
                LEFT JOIN customer_groups ON customers.customer_group_id = customer_groups.id
                LEFT JOIN service_types ON customers.service_type_id = service_types.id
                WHERE customers.customer_group_id = ?";
                
        return $this->db->query($sql, array($group_id))->result();
    }

public function get_customer_groups($limit, $start, $search = '') {
    $this->db->select('customer_groups.*, suppliers.cidsupplier');
    $this->db->from('customer_groups');
    $this->db->join('suppliers', 'customer_groups.kdsupplier = suppliers.kdsupplier', 'left');

    if (!empty($search)) {
        $this->db->group_start()
                 ->like('customer_groups.group_name', $search)
                 ->or_like('suppliers.cidsupplier', $search)
                 ->group_end();
    }

    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
}

public function count_customer_groups($search = '') {
    $this->db->from('customer_groups');
    $this->db->join('suppliers', 'customer_groups.kdsupplier = suppliers.kdsupplier', 'left');

    if (!empty($search)) {
        $this->db->group_start()
                 ->like('customer_groups.group_name', $search)
                 ->or_like('suppliers.cidsupplier', $search)
                 ->group_end();
    }

    return $this->db->count_all_results();
}

    // Get all suppliers
    public function get_all_suppliers() {
        $sql = "SELECT * FROM suppliers";
        return $this->db->query($sql)->result();
    }

    // Get all service types
    public function get_all_service_types() {
        $sql = "SELECT * FROM service_types";
        return $this->db->query($sql)->result();
    }

    public function insert_customer($data) {
        $sql = "INSERT INTO customers (customer, customer_group_id, kdsupplier, cid_supp, no_so, no_sdn, service_type_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        return $this->db->query($sql, array(
            $data['customer'],
            $data['customer_group_id'],
            $data['kdsupplier'], // Use 'kdsupplier' here as expected from the form
            $data['cid_supp'],
            $data['no_so'],
            $data['no_sdn'],
            $data['service_type_id']
        ));
    }
}
