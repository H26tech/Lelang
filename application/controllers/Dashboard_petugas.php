<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_petugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Petugas_model'); // Ganti dengan Petugas_model
        $this->load->model('Lelang_model'); // Ganti dengan Petugas_model
        $this->load->library('form_validation'); // Form validation
        // Periksa apakah pengguna sudah login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login'); // Redirect ke halaman login
        }
    }
    public function index()
    {
        $data['total_barang'] = $this->Lelang_model->countTotalBarang();
        $data['status_terbuka'] = $this->Lelang_model->countStatusTerbuka();
        $data['status_tertutup'] = $this->Lelang_model->countStatusTertutup();
        $data['total_peserta_bid'] = $this->Lelang_model->countTotalPesertaBid();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('petugas/dashboard', $data); // Kirim $data ke view
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
        // Validasi form
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('harga_awal', 'Harga Awal', 'required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->edit_barang($id_barang);
        } else {
            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
                'harga_awal' => $this->input->post('harga_awal'),
                'status' => $this->input->post('status'),
                'deskripsi' => $this->input->post('deskripsi'),
            );

            // Jika ada file yang diupload
            if (!empty($_FILES['gambar']['name'])) {
                $upload = $this->do_upload();

                if (isset($upload['error'])) {
                    $this->session->set_flashdata('message', $upload['error']);
                    redirect('dashboard_petugas/edit_barang/' . $id_barang);
                } else {
                    $data['gambar'] = $upload['upload_data']['file_name'];

                    // Hapus gambar lama jika ada
                    $barang = $this->Petugas_model->get_barang_by_id($id_barang);
                    if (!empty($barang['gambar']) && file_exists('./uploads/' . $barang['gambar'])) {
                        unlink('./uploads/' . $barang['gambar']);
                    }
                }
            }

            // Update data barang
            $this->Petugas_model->update_barang($id_barang, $data);

            // Redirect dengan pesan sukses
            $this->session->set_flashdata('message', 'Barang berhasil diperbarui');
            redirect('dashboard_petugas/data_lelang');
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

    private function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['file_name'] = time() . '_' . $_FILES['gambar']['name'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            return ['error' => $this->upload->display_errors()];
        } else {
            return ['upload_data' => $this->upload->data()];
        }
    }
}
