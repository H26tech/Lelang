<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load database dan form validation library
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
        $this->load->library('session'); // Pastikan session library ter-load
    }

    // Menampilkan halaman login
    public function login()
    {
        $this->load->view('auth/login');
    }

    // Proses login
    public function login_process()
    {
        // Validasi input login
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Username dan Password harus diisi.');
            redirect('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password'); // Input password

            // Query user dari tb_masyarakat
            $user = $this->db->get_where('tb_masyarakat', ['username' => $username])->row();

            // Query petugas dari tb_petugas
            $petugas = $this->db->get_where('tb_petugas', ['username' => $username])->row();

            if ($user) {
                // Jika user ditemukan, cek password
                if (password_verify($password, $user->password)) {
                    // Password cocok, set session
                    $this->session->set_userdata([
                        'user_type' => 'user',
                        'username' => $user->username,
                        'user_id' => $user->id_user
                    ]);

                    redirect('user/dashboard'); // Redirect ke halaman user
                } else {
                    // Password salah
                    $this->session->set_flashdata('error', 'Password salah.');
                    redirect('auth/login');
                }
            } elseif ($petugas) {
                // Jika petugas ditemukan, cek password
                if (password_verify($password, $petugas->password)) {
                    // Password cocok, set session sesuai level
                    $this->session->set_userdata([
                        'user_id' => $petugas->id_petugas,
                        'username' => $petugas->username,
                    ]);

                    if ($petugas->id_level == 1) {
                        $this->session->set_userdata('user_type', 'admin');
                        redirect('admin/dashboard'); // Redirect admin
                    } elseif ($petugas->id_level == 2) {
                        $this->session->set_userdata('user_type', 'petugas');
                        redirect('petugas/dashboard'); // Redirect petugas
                    }
                } else {
                    // Password salah
                    $this->session->set_flashdata('error', 'Password salah.');
                    redirect('auth/login');
                }
            } else {
                // Username tidak ditemukan
                $this->session->set_flashdata('error', 'Username tidak ditemukan.');
                redirect('auth/login');
            }
        }
    }

    // Menampilkan halaman register
    public function register()
    {
        $this->load->view('auth/register');
    }

    // Proses registrasi user
public function register_user()
{
    // Set form validation rules
    $this->form_validation->set_rules('nama_lengkap', 'Full Name', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_masyarakat.username]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    $this->form_validation->set_rules('telp', 'Phone Number', 'required|numeric');

    if ($this->form_validation->run() === FALSE) {
        // Jika validasi gagal, tampilkan ulang form registrasi
        $this->load->view('templates/header');
        $this->load->view('auth/register');
        $this->load->view('templates/footer');
    } else {
        // Hash password menggunakan PASSWORD_DEFAULT untuk konsistensi
        $hashed_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'username'     => $this->input->post('username'),
            'password'     => $hashed_password,
            'telp'         => $this->input->post('telp'),
        ];

        // Simpan data user ke database melalui model (optional: gunakan model untuk lebih rapi)
        if ($this->db->insert('tb_masyarakat', $data)) {
            $this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
            redirect('auth/login'); // Arahkan ke halaman login
        } else {
            log_message('error', 'Gagal menyimpan user: ' . $data['username']);
            $this->session->set_flashdata('error', 'Gagal registrasi, coba lagi.');
            $this->load->view('auth/register');
        }
    }
}
    // Logout user
    public function logout()
    {
        // Hapus semua data session
        $this->session->unset_userdata('user_type');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user_id');

        // Hancurkan session
        $this->session->sess_destroy();

        // Redirect ke halaman login
        redirect('auth/login');
    }
}
