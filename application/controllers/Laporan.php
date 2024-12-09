<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
        // Periksa apakah pengguna sudah login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login'); // Redirect ke halaman login
        }
    }

    public function index()
    {
        // Ambil data barang dari model
        $data['barang'] = $this->Laporan_model->getAllBarang();
        // Load views
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('petugas/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function get_bid_detail($id_barang)
    {
        // Ambil bid detail berdasarkan id_barang
        $data['barang'] = $this->Laporan_model->getBarangById($id_barang);
        $data['bid_details'] = $this->Laporan_model->get_bid_details_by_barang($id_barang);

        // Load the view for bid details
        $this->load->view('petugas/laporan_detail', $data);
    }
    public function detail($id_barang)
    {
        // Ambil data barang berdasarkan id_barang
        $data['barang'] = $this->Laporan_model->getBarangById($id_barang);

        // Ambil data bid berdasarkan id_barang
        $this->db->select('b.id_user, b.bid_amount, b.created_at, m.nama_lengkap, m.telp');
        $this->db->from('tb_bid b');
        $this->db->join('tb_masyarakat m', 'm.id_user = b.id_user');
        $this->db->where('b.id_barang', $id_barang);
        $query = $this->db->get();
        $data['bids'] = $query->result_array();

        // Load view untuk menampilkan data
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('petugas/detail_laporan', $data);
        $this->load->view('templates/footer');
    }
    public function full_detail()
    {
        // Ambil seluruh data barang dan urutkan berdasarkan harga_awal
        $this->db->order_by('harga_awal', 'ASC');  // Mengurutkan berdasarkan harga_awal
        $data['barang'] = $this->Laporan_model->getAllBarang();

        // Ambil seluruh data bid yang terkait dengan barang
        $this->db->select('b.id_barang, b.id_user, b.bid_amount, b.created_at, m.nama_lengkap, m.telp');
        $this->db->from('tb_bid b');
        $this->db->join('tb_masyarakat m', 'm.id_user = b.id_user');
        $query = $this->db->get();
        $data['bids'] = $query->result_array();

        // Mencari bid tertinggi untuk setiap barang
        $max_bid_per_barang = [];
        foreach ($data['barang'] as $barang) {
            // Ambil semua bid untuk barang ini
            $filtered_bids = array_filter($data['bids'], function ($bid) use ($barang) {
                return $bid['id_barang'] == $barang['id_barang'];
            });

            // Temukan bid tertinggi untuk barang ini
            $max_bid_per_barang[$barang['id_barang']] = max(array_column($filtered_bids, 'bid_amount'));
        }

        // Menyimpan max_bid_per_barang dalam data untuk digunakan di view
        $data['max_bid_per_barang'] = $max_bid_per_barang;

        // Load view untuk menampilkan data lengkap
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('petugas/full_detail_laporan', $data);
        $this->load->view('templates/footer');
    }

    public function export_to_csv()
    {
        // Ambil data barang dan bids dari model
        $barang = $this->Laporan_model->getAllBarang();
        $bids = $this->db->select('b.id_barang, b.bid_amount, b.created_at, m.nama_lengkap, m.telp')
            ->from('tb_bid b')
            ->join('tb_masyarakat m', 'm.id_user = b.id_user')
            ->get()
            ->result_array();

        // Set header untuk download file CSV
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="Laporan_Barang.csv"');

        // Buka output sebagai "file"
        $output = fopen('php://output', 'w');

        // Tambahkan judul laporan
        fputcsv($output, ['Laporan Data Lelang Barang']);
        fputcsv($output, []); // Baris kosong sebagai pemisah

        // Tulis header kolom
        fputcsv($output, ['ID Barang', 'Nama Barang', 'Harga Awal', 'Bidder', 'Bid Amount', 'Tanggal Bid', 'Phone']);

        // Tulis data ke CSV
        foreach ($barang as $b) {
            foreach ($bids as $bid) {
                if ($bid['id_barang'] == $b['id_barang']) {
                    fputcsv($output, [
                        $b['id_barang'],
                        $b['nama_barang'],
                        $b['harga_awal'],
                        $bid['nama_lengkap'],
                        $bid['bid_amount'],
                        $bid['created_at'],
                        $bid['telp'],
                    ]);
                }
            }
        }

        // Tutup file
        fclose($output);
        exit;
    }
}
