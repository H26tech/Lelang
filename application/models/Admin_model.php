<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();  // Load database
    }

    // Insert new petugas/admin into database
    public function get_levels()
    {
        return $this->db->get('tb_level')->result();
    }

    public function register_petugas($data)
    {
        return $this->db->insert('tb_petugas', $data);
    }

    // nampilin data akun
    public function get_all_accounts()
    {
        // Ambil id_petugas, nama_petugas, username, dan level name dari join
        $this->db->select('tb_petugas.id_petugas, tb_petugas.nama_petugas, tb_petugas.username, tb_level.level AS level_name');
        $this->db->from('tb_petugas');
        $this->db->join('tb_level', 'tb_petugas.id_level = tb_level.id_level');
        $query = $this->db->get();
        return $query->result(); // Mengembalikan hasil dalam bentuk array object
    }
    // Mendapatkan data akun berdasarkan id_petugas
    public function get_account_by_id($id)
    {
        return $this->db->get_where('tb_petugas', ['id_petugas' => $id])->row();
    }

    // Update data akun
    public function update_account($id, $data)
    {
        $this->db->where('id_petugas', $id);
        return $this->db->update('tb_petugas', $data);
    }

    // Hapus akun
    public function delete_account($id)
    {
        return $this->db->delete('tb_petugas', ['id_petugas' => $id]);
    }

    // Ambil semua akun user dari tb_masyarakat
    public function get_all_users()
    {
        $this->db->select('id_user, nama_lengkap, username, telp');
        $this->db->from('tb_masyarakat');
        $query = $this->db->get();
        return $query->result(); // Mengembalikan hasil dalam bentuk array objek
    }
    // Hapus akun user dari tb_masyarakat
    public function delete_user($id)
    {
        return $this->db->delete('tb_masyarakat', ['id_user' => $id]);
    }

    // Ambil data user berdasarkan id_user
    public function get_user_by_id($id)
    {
        return $this->db->get_where('tb_masyarakat', ['id_user' => $id])->row();
    }

    // Update data user berdasarkan id_user
    public function update_user($id, $data)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('tb_masyarakat', $data);
    }

    // Menghitung jumlah akun user dari tabel tb_masyarakat
    public function countUsers()
    {
        return $this->db->count_all('tb_masyarakat'); // Tabel tb_masyarakat
    }

    public function countAdmins()
    {
        return $this->db->where('id_level', 1)->count_all_results('tb_petugas'); // Tabel tb_petugas, admin: id_level = 1
    }

    public function countPetugas()
    {
        return $this->db->where('id_level', 2)->count_all_results('tb_petugas'); // Tabel tb_petugas, petugas: id_level = 2
    }

    public function countBarang()
    {
        return $this->db->count_all('barang'); // Tabel tb_barang
    }
}
