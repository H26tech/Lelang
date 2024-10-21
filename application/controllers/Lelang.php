<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lelang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lelang_model'); // Using the Lelang_model
    }

    // Method to load the form for adding barang
    public function data_barang()
    {
        $this->load->view('templates/header'); // Re-load the form on validation error
        $this->load->view('templates/sidebar'); // Re-load the form on validation error
        $this->load->view('petugas/data_barang'); // Re-load the form on validation error
        $this->load->view('templates/footer'); // Re-load the form on validation error
    }

    // Method to handle form submission
    public function store_barang()
    {
        // Load form validation and set rules
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required');
        $this->form_validation->set_rules('harga_awal', 'Harga Awal', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('petugas/data_barang'); // Re-load the form on validation error
        } else {
            // Handle file upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('petugas/data_barang', $error);
            } else {
                // Data to be saved
                $data = array(
                    'nama_barang' => $this->input->post('nama_barang'),
                    'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                    'tanggal_selesai' => $this->input->post('tanggal_selesai'),
                    'harga_awal' => $this->input->post('harga_awal'),
                    'status' => $this->input->post('status'),
                    'gambar' => $this->upload->data('file_name'),
                    'history' => $this->input->post('history')
                );

                $this->Lelang_model->insert_barang($data);
                redirect('lelang/data_barang');
            }
        }
    }
    public function data_pemenang()
    {   
        $this->load->model('Lelang_model');
        $data['posts'] = $this->Lelang_model->getAllPostsWithBids();
        $this->load->view('templates/header'); // Re-load the form on validation error
        $this->load->view('templates/sidebar'); // Re-load the form on validation error
        $this->load->view('petugas/data_pemenang', $data);
        $this->load->view('templates/footer'); // Re-load the form on validation error
    }
}
