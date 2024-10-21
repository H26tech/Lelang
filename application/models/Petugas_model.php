<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();  // Load database
    }

    // Ambil semua data barang untuk petugas (baik dibuka maupun ditutup)
    public function get_all_barang()
    {
        $query = $this->db->get('barang');  // Ambil semua data dari tabel barang
        return $query->result_array();
    }

    // Ambil data barang berdasarkan id_barang
    public function get_barang_by_id($id_barang)
    {
        $query = $this->db->get_where('barang', array('id_barang' => $id_barang));  // Ambil barang sesuai id_barang
        return $query->row_array();  // Kembalikan satu baris data barang
    }

    // Update data barang berdasarkan id_barang
    public function update_barang($id_barang, $data)
    {
        $this->db->where('id_barang', $id_barang);  // Cari barang berdasarkan id
        $this->db->update('barang', $data);  // Update barang dengan data baru
        return $this->db->affected_rows();  // Kembalikan hasil dari update, berapa baris yang terpengaruh
    }

    // Ambil barang yang statusnya 'dibuka' (untuk ditampilkan di halaman user)
    public function get_barang_dibuka()
    {
        // Hanya ambil barang dengan status 'dibuka'
        $this->db->where('status', 'dibuka');
        $query = $this->db->get('barang');
        return $query->result_array();  // Kembalikan data dalam bentuk array
    }


    // Tambahkan barang baru ke dalam tabel barang
    public function add_barang($data)
    {
        $this->db->insert('barang', $data);  // Masukkan data ke tabel barang
        return $this->db->affected_rows();  // Kembalikan hasil dari insert, berapa baris yang terpengaruh
    }

    // Hapus barang berdasarkan id_barang
    public function delete_barang($id_barang)
    {
        $this->db->where('id_barang', $id_barang);  // Cari barang berdasarkan id_barang
        $this->db->delete('barang');  // Hapus barang dari tabel
        return $this->db->affected_rows();  // Kembalikan hasil dari delete
    }

    // Fungsi tambahan: ambil barang dengan status 'ditutup' (opsional jika dibutuhkan)
    public function get_barang_ditutup()
    {
        $this->db->where('status', 'ditutup');  // Hanya ambil barang dengan status 'ditutup'
        $query = $this->db->get('barang');  // Ambil data dari tabel barang
        return $query->result_array();  // Kembalikan data dalam bentuk array
    }
}
