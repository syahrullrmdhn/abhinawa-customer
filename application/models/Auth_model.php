<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function check_user($username, $password) {
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $query = $this->db->query($sql, array($username, $password));
        return $query->row();
    }
}

