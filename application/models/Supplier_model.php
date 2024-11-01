<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class supplier_model extends CI_Model {

    public function get_all_suppliers() {
        $this->db->select('kdsupplier, nama_supplier, cidsupplier, start_service, end_service'); // Make sure 'id' is included
        $this->db->from('suppliers');
        $query = $this->db->get();
        return $query->result();
    }

    // Get supplier by ID
    public function get_supplier_by_id($id) {
        $sql = "SELECT * FROM suppliers WHERE id = ?";
        $query = $this->db->query($sql, array($id));
        return $query->row();
    }

    // Insert new supplier
    public function insert_supplier($data) {
        $sql = "INSERT INTO suppliers (kdsupplier, nama_supplier, cidsupplier, start_service, end_service) 
                VALUES (?, ?, ?, ?, ?)";
        return $this->db->query($sql, array(
            $data['kdsupplier'], 
            $data['nama_supplier'], 
            $data['cidsupplier'], 
            $data['start_service'], 
            $data['end_service']
        ));
    }

    // Update supplier by ID
    public function update_supplier($id, $data) {
        $sql = "UPDATE suppliers SET kdsupplier = ?, nama_supplier = ?, cidsupplier = ?, start_service = ?, end_service = ? 
                WHERE id = ?";
        return $this->db->query($sql, array(
            $data['kdsupplier'], 
            $data['nama_supplier'], 
            $data['cidsupplier'], 
            $data['start_service'], 
            $data['end_service'], 
            $id
        ));
    }

    // Delete supplier by ID
    public function delete_supplier($id) {
        $sql = "DELETE FROM suppliers WHERE id = ?";
        return $this->db->query($sql, array($id));
    }
}
