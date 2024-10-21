<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_petugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Petugas_model'); // Ganti dengan Petugas_model
        $this->load->library('form_validation'); // Form validation
    }
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('petugas/dashboard');
        $this->load->view('templates/footer');
    }
    // Function untuk menampilkan form edit barang
    public function edit_barang($id_barang)
    {
        // Ambil data barang berdasarkan id_barang dari Petugas_model
        $data['barang'] = $this->Petugas_model->get_barang_by_id($id_barang);

        if (empty($data['barang'])) {
            show_404(); // Jika barang tidak ditemukan, tampilkan halaman 404
        }

        // Load view untuk form edit barang0
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('petugas/edit_barang', $data);
        $this->load->view('templates/footer');
    }

    // Function untuk mengupdate barang lelang
    public function update_barang($id_barang)
    {
        // Set form validation
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('harga_awal', 'Harga Awal', 'required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->edit_barang($id_barang); // Jika validasi gagal, kembali ke form edit
        } else {
            // Data yang akan di-update
            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
                'harga_awal' => $this->input->post('harga_awal'),
                'status' => $this->input->post('status')
            );

            // Panggil fungsi update di Petugas_model
            $this->Petugas_model->update_barang($id_barang, $data);

            // Redirect ke halaman data barang dengan pesan sukses
            $this->session->set_flashdata('message', 'Barang berhasil diperbarui');
            redirect('petugas/data_lelang');
        }
    }

    // Function untuk menampilkan semua barang lelang untuk petugas
    public function data_lelang()
    {
        $data['barang'] = $this->Petugas_model->get_all_barang();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('petugas/data_lelang', $data);
        $this->load->view('templates/footer');
    }
    public function hapus_barang($id_barang)
    {
        // Pastikan model sudah ter-load di controller
        $this->load->model('Petugas_model');

        // Jalankan fungsi hapus di model
        $this->Petugas_model->hapus_barang($id_barang);

        // Set flashdata untuk notifikasi berhasil
        $this->session->set_flashdata('message', 'Barang berhasil dihapus.');

        // Redirect kembali ke halaman utama
        redirect('dashboard_petugas');
    }
}
