<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $sess = $this->session->userdata('status');
        $user = $this->session->userdata('username');
        if ($sess && $user) {
            redirect('admin');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('auth/login', $data);
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $user = $this->db->get_where('admin', ['username' => $username])->row_array();

        if ($user) {
            //Cek Password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'status' => $user['status'],
                    'username' => $user['username']
                ];

                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Salah! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username Tidak Diketahui! </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('username');
        //$this->session->unset_userdata('nama');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Logout Berhasil </div>');
        redirect('auth');
    }
}
