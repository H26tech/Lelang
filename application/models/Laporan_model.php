<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function getAllBarang()
    {
        return $this->db->get('barang')->result_array(); // Sesuaikan nama tabel Anda
    }

    public function getBarangById($id_barang)
    {
        return $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
    }
    public function get_bid_details_by_barang($id_barang)
    {
        // Mengambil data bid berdasarkan id_barang
        $this->db->select('b.id_user, b.bid_amount, b.created_at, m.nama_lengkap');
        $this->db->from('tb_bid b');
        $this->db->join('tb_masyarakat m', 'm.id_user = b.id_user');
        $this->db->where('b.id_barang', $id_barang);
        return $this->db->get()->result_array();
    }
    
}
