<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bid_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Memastikan database terload
    }

    // Contoh fungsi untuk menyimpan bid/tawaran dari user
    public function save_bid($data)
    {
        return $this->db->insert('tb_bid', $data);  // Menyimpan bid ke tabel tb_bid
    }

    // Contoh fungsi untuk mendapatkan tawaran/bid tertinggi pada suatu barang
    public function get_highest_bid($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->order_by('bid_amount', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_bid');
        return $query->row_array();  // Mengembalikan satu bid tertinggi
    }

    // Fungsi lain untuk mendapatkan daftar semua tawaran dari user
    public function get_all_bids($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $query = $this->db->get('tb_bid');
        return $query->result_array();  // Mengembalikan semua bid pada barang terkait
    }
    // Fungsi untuk mengecek apakah bid dengan nominal yang sama sudah ada
    public function is_bid_exists($id_barang, $bid_amount)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->where('bid_amount', $bid_amount);
        $query = $this->db->get('tb_bid'); // Asumsi tabel bid bernama tb_bid

        if ($query->num_rows() > 0) {
            return true; // Bid dengan nominal yang sama sudah ada
        }

        return false; // Tidak ada bid dengan nominal yang sama
    }

    // Fungsi untuk submit bid
    public function submit_bid($data)
    {
        return $this->db->insert('tb_bid', $data); // Asumsi tabel bid bernama tb_bid
    }
}
