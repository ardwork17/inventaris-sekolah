<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function index()
    {
        //untuk validasi
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Masukan Email!',
            'valid_email' => 'Email Tidak Valid!'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Masukan Password!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login'; //untuk judul
            $this->load->view('templates/auth_header', $data); // template header
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer'); // template footer

        } else {
            // validasi sukses kita lanjutkan ke login dengan membuat file baru biar tidak panjang dan dibuat private supaya tidak di ases di url
            $this->login();
        }
    }


    private function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // jika user ada
        if ($user) {
            // jika user aktif
            if ($user['is_active'] == 1) {
                // cek paswwordnya
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] ==  1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                    //jika password salah
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah! </div>');
                    redirect('auth');
                }
                // user belum aktif
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email belum aktif! </div>');
                redirect('auth');
            }
            // user tidak ada
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar! </div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda berhasil keluar</div>');
        redirect('auth');
    }
}
