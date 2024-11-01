<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

    // Get all users
    public function get_all_users() {
        $sql = "SELECT * FROM users";
        $query = $this->db->query($sql);
        return $query->result();
    }

    // Get user by ID
    public function get_user_by_id($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $query = $this->db->query($sql, array($id));
        return $query->row();
    }

    // Insert new user
    public function insert_user($data) {
        $data['password'] = md5($data['password']); // Hash the password with MD5
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        return $this->db->query($sql, array($data['username'], $data['password']));
    }

    // Update user by ID
    public function update_user($id, $data) {
        if (!empty($data['password'])) {
            $data['password'] = md5($data['password']); // Hash the password with MD5
            $sql = "UPDATE users SET username = ?, password = ? WHERE id = ?";
            return $this->db->query($sql, array($data['username'], $data['password'], $id));
        } else {
            $sql = "UPDATE users SET username = ? WHERE id = ?";
            return $this->db->query($sql, array($data['username'], $id));
        }
    }

    // Delete user by ID
    public function delete_user($id) {
        $sql = "DELETE FROM users WHERE id = ?";
        return $this->db->query($sql, array($id));
    }
    public function update_password($id, $new_password) {
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        return $this->db->query($sql, array($new_password, $id));
    }
}
