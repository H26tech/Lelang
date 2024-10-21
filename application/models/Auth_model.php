<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    // Fungsi untuk register user
    public function register($data)
    {
        return $this->db->insert('tb_masyarakat', $data);
    }
    // Fungsi untuk mendapatkan user berdasarkan username atau email
    public function get_user($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('tb_masyarakat')->row();
    }

    // Fungsi untuk validasi login user
    public function login($username, $password)
    {
        $user = $this->get_user($username);
        
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }

    // Fungsi untuk memeriksa petugas
    public function get_petugas($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('tb_petugas')->row();
    }

    // Fungsi login untuk petugas
    public function login_petugas($username, $password)
    {
        $petugas = $this->get_petugas($username);
        
        if ($petugas && password_verify($password, $petugas->password)) {
            return $petugas;
        }
        return false;
    }
}