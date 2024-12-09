<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{


    public function getUserBidHistory($id_user)
    {
        // Mengambil riwayat bid beserta nama barang dan status barang
        $this->db->select('b.id_barang, b.bid_amount, b.created_at, br.nama_barang, br.status');
        $this->db->from('tb_bid b');
        $this->db->join('barang br', 'br.id_barang = b.id_barang');
        $this->db->where('b.id_user', $id_user); // Menyaring berdasarkan user_id
        $this->db->order_by('b.created_at', 'DESC'); // Urutkan berdasarkan waktu bid
        return $this->db->get()->result_array();
    }
}
