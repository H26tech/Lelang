<?php
class Lelang_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    // Method to insert new barang data
    public function insert_barang($data)
    {
        return $this->db->insert('barang', $data);
    }

    // Existing function to get barang by status 'dibuka'
    public function get_barang_dibuka()
    {
        $this->db->where('status', 'dibuka');
        $query = $this->db->get('barang');
        return $query->result_array();
    }

    // Function to get barang by id
    public function get_barang_by_id($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $query = $this->db->get('barang');
        return $query->row_array(); // Get a single record
    }

    // Fungsi untuk mengambil semua barang (hanya untuk referensi)
    public function get_all_barang()
    {
        $query = $this->db->get('barang');
        return $query->result_array();
    }
    
    public function getAllPostsWithBids() {
        $this->db->select('barang.nama_barang, tb_masyarakat.nama_lengkap, tb_masyarakat.telp, tb_bid.bid_amount');
        $this->db->from('tb_bid');
        $this->db->join('barang', 'barang.id_barang = tb_bid.id_barang');
        $this->db->join('tb_masyarakat', 'tb_masyarakat.id_user = tb_bid.id_user');
        $this->db->order_by('tb_bid.id_barang', 'DESC');
        return $this->db->get()->result_array();
    }
    
}
