<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model'); // Load the Admin_model
        $this->load->library('form_validation'); // Load form validation library
        $this->load->helper('url'); // Load URL helper for redirects
        $this->load->library('session'); // Load session library for flashdata
    }

    // Main dashboard view
    public function index()
    {
        $this->load->view('templates/header');   // Load header
        $this->load->view('templates/sidebar');  // Load sidebar
        $this->load->view('admin/dashboard');    // Load main dashboard view
        $this->load->view('templates/footer');   // Load footer
    }

    // Register form for admin or petugas
    public function register_akun()
    {
        $data['levels'] = $this->Admin_model->get_levels(); // Fetch levels from the database

        // Set form validation rules
        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_petugas.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('id_level', 'Level', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Validation failed, reload the form with errors
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('auth/register_admin', $data); // Pass levels data to the view
            $this->load->view('templates/footer');
        } else {
            // Process the form submission and save the data
            $data = array(
                'nama_petugas' => $this->input->post('nama_petugas'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'id_level' => $this->input->post('id_level')
            );

            // Save the data via the model
            if ($this->Admin_model->register_petugas($data)) {
                $this->session->set_flashdata('message', 'Admin/Petugas berhasil didaftarkan.');
                redirect('dashboard_admin');
            } else {
                log_message('error', 'Registration failed for username: ' . $data['username']);
                $this->session->set_flashdata('message', 'Gagal mendaftarkan Admin/Petugas.');
                $this->load->view('templates/header');
                $this->load->view('templates/sidebar');
                $this->load->view('auth/register_admin', $data);
                $this->load->view('templates/footer');
            }
        }
    }
    private function get_level_id($level_name)
    {
        // Map user input level to actual id_level in database
        if ($level_name == 'administrator') {
            return 1;  // Admin = 1
        } else if ($level_name == 'petugas') {
            return 2;  // Petugas = 2
        }
        return null;  // Default null if level is invalid
    }

    public function list_akun()
    {
        // Ambil data akun dari model
        $data['accounts'] = $this->Admin_model->get_all_accounts();

        // Muat view dengan data akun
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/list_akun', $data); // Kirim data ke view
        $this->load->view('templates/footer');
    }
    // Fungsi edit akun
    public function edit_akun()
    {
        $id = $this->input->post('id_petugas');
        $nama_petugas = $this->input->post('nama_petugas');
        $username = $this->input->post('username');
        $id_level = $this->input->post('id_level');
        $password = $this->input->post('password'); // Password baru (opsional)

        $data = [
            'nama_petugas' => $nama_petugas,
            'username' => $username,
            'id_level' => $id_level,
        ];

        // Jika password diisi, hash dan tambahkan ke data
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($this->Admin_model->update_account($id, $data)) {
            $this->session->set_flashdata('success', 'Akun berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui akun.');
        }

        redirect('dashboard_admin/list_akun');
    }


    // Fungsi hapus akun
    public function delete_akun($id)
    {
        if ($this->Admin_model->delete_account($id)) {
            $this->session->set_flashdata('success', 'Akun berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus akun.');
        }

        redirect('dashboard_admin/list_akun');
    }
}
