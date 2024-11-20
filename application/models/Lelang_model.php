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

    public function getAllPostsWithBids()
    {
        $this->db->select('
        barang.nama_barang,
        MAX(tb_bid.bid_amount) AS highest_bid,
        COUNT(DISTINCT tb_bid.id_user) AS total_bidders,
        (SELECT tb_masyarakat.nama_lengkap
         FROM tb_bid
         JOIN tb_masyarakat ON tb_masyarakat.id_user = tb_bid.id_user
         WHERE tb_bid.id_barang = barang.id_barang
         ORDER BY tb_bid.bid_amount DESC LIMIT 1) AS winner_name,
        (SELECT tb_masyarakat.telp
         FROM tb_bid
         JOIN tb_masyarakat ON tb_masyarakat.id_user = tb_bid.id_user
         WHERE tb_bid.id_barang = barang.id_barang
         ORDER BY tb_bid.bid_amount DESC LIMIT 1) AS winner_phone
    ');
        $this->db->from('tb_bid');
        $this->db->join('barang', 'barang.id_barang = tb_bid.id_barang');
        $this->db->group_by('barang.id_barang');
        $this->db->order_by('highest_bid', 'DESC');

        return $this->db->get()->result_array();
    }

    public function countTotalBarang()
    {
        return $this->db->count_all('barang');
    }

    public function countStatusTerbuka()
    {
        $this->db->where('status', 'dibuka');
        return $this->db->count_all_results('barang');
    }

    public function countStatusTertutup()
    {
        $this->db->where('status', 'ditutup');
        return $this->db->count_all_results('barang');
    }

    public function countTotalPesertaBid()
    {
        $this->db->distinct();
        $this->db->select('id_user');
        return $this->db->count_all_results('tb_bid');
    }
}
