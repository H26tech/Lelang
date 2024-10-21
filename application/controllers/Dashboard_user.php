<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lelang_model'); // Load Lelang_model
        $this->load->model('Bid_model'); // Load Bid_model for handling bids
    }

    public function index()
    {
        // Fetch barang dengan status 'dibuka'
        $data['barang'] = $this->Lelang_model->get_barang_dibuka();

        // Load the views
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar_user');
        $this->load->view('user/dashboard', $data); // Pass barang data to the view
        $this->load->view('templates/footer');
    }
    // Function to show detail of each barang
    public function detail_barang($id_barang)
    {
        // Fetch barang data by id
        $data['barang'] = $this->Lelang_model->get_barang_by_id($id_barang);
        $data['highest_bid'] = $this->Bid_model->get_highest_bid($id_barang); // Fetch the highest bid for this barang

        // Load views for the detail page
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar_user');
        $this->load->view('user/detail_barang', $data); // Pass barang data to the view
        $this->load->view('templates/footer');
    }

    // Function to handle bid submission
    public function submit_bid()
    {
        // Pastikan form method POST
        if ($this->input->post()) {
            $id_barang = $this->input->post('id_barang');
            $bid_amount = $this->input->post('bid_amount');
            $id_user = $this->session->userdata('user_id');

            // Periksa apakah sudah ada bid dengan nominal yang sama
            if ($this->Bid_model->is_bid_exists($id_barang, $bid_amount)) {
                // Jika bid sudah ada, tampilkan pesan error
                $this->session->set_flashdata('message', 'Bid dengan nominal yang sama sudah ada.');
            } else {
                // Jika tidak ada bid yang sama, submit bid
                $data = array(
                    'id_barang' => $id_barang,
                    'id_user' => $id_user,
                    'bid_amount' => $bid_amount,
                    // Tambahkan kolom lain jika perlu
                );

                // Panggil metode submit_bid dari Bid_model
                if ($this->Bid_model->submit_bid($data)) {
                    // Berhasil
                    $this->session->set_flashdata('message', 'Tawaran berhasil diajukan.');
                } else {
                    // Gagal
                    $this->session->set_flashdata('message', 'Gagal mengajukan tawaran.');
                }
            }

            // Redirect kembali ke halaman detail barang agar tetap di halaman yang sama
            redirect('dashboard_user/detail_barang/' . $id_barang);
        }

        // Reload atau tampilkan halaman jika tidak ada POST
        redirect('dashboard_user');
    }
}
