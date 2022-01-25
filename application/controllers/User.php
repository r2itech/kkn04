<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    //Home
    public function index()
    {
        $data['title'] = 'home';
        $data['about'] = $this->db->get('about')->row_array();
        $data['product'] = $this->db->get('produk')->result_array();

        $this->load->view('template2/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template2/footer');
    }

    //Info Update
    public function infoUpdate()
    {
        $data['title'] = 'info update';
        $data['about'] = $this->db->get('about')->row_array();

        $this->load->view('template2/header', $data);
        $this->load->view('user/infoUpdate', $data);
        $this->load->view('template2/footer');
    }

    //Profile Desa
    public function profileDesaSejarah()
    {
        $data['title'] = 'profil desa';
        $data['about'] = $this->db->get('about')->row_array();
        $data['profile'] = $this->db->get_where('profildesa', ['id' => 1])->row_array();

        $this->load->view('template2/header', $data);
        $this->load->view('user/profilDesa', $data);
        $this->load->view('template2/footer');
    }
    public function profileDesaWilayah()
    {
        $data['title'] = 'profil desa';
        $data['about'] = $this->db->get('about')->row_array();
        $data['profile'] = $this->db->get_where('profildesa', ['id' => 2])->row_array();

        $this->load->view('template2/header', $data);
        $this->load->view('user/profilDesa', $data);
        $this->load->view('template2/footer');
    }
    public function profileDesaArtiLambang()
    {
        $data['title'] = 'profil desa';
        $data['about'] = $this->db->get('about')->row_array();
        $data['profile'] = $this->db->get_where('profildesa', ['id' => 3])->row_array();

        $this->load->view('template2/header', $data);
        $this->load->view('user/profilDesa', $data);
        $this->load->view('template2/footer');
    }
    public function profileDesaStrukturOrganisasi()
    {
        $data['title'] = 'profil desa';
        $data['about'] = $this->db->get('about')->row_array();
        $data['profile'] = $this->db->get_where('profildesa', ['id' => 4])->row_array();

        $this->load->view('template2/header', $data);
        $this->load->view('user/profilDesa', $data);
        $this->load->view('template2/footer');
    }

    //Profile Usaha
    public function profileUsahaSejarah()
    {
        $data['title'] = 'profil wirausaha';
        $data['about'] = $this->db->get('about')->row_array();
        $data['profile'] = $this->db->get_where('profilusaha', ['id' => 1])->row_array();

        $this->load->view('template2/header', $data);
        $this->load->view('user/profilUsaha', $data);
        $this->load->view('template2/footer');
    }
    public function profileUsahaAlamat()
    {
        $data['title'] = 'profil wirausaha';
        $data['about'] = $this->db->get('about')->row_array();
        $data['profile'] = $this->db->get_where('profilusaha', ['id' => 2])->row_array();

        $this->load->view('template2/header', $data);
        $this->load->view('user/profilUsaha', $data);
        $this->load->view('template2/footer');
    }
    public function profileUsahaArtiLambang()
    {
        $data['title'] = 'profil wirausaha';
        $data['about'] = $this->db->get('about')->row_array();
        $data['profile'] = $this->db->get_where('profilusaha', ['id' => 3])->row_array();

        $this->load->view('template2/header', $data);
        $this->load->view('user/profilUsaha', $data);
        $this->load->view('template2/footer');
    }
    public function profileUsahaStrukturOrganisasi()
    {
        $data['title'] = 'profil wirausaha';
        $data['about'] = $this->db->get('about')->row_array();
        $data['profile'] = $this->db->get_where('profilusaha', ['id' => 4])->row_array();

        $this->load->view('template2/header', $data);
        $this->load->view('user/profilUsaha', $data);
        $this->load->view('template2/footer');
    }

    //Product
    public function product()
    {
        $data['title'] = 'product';
        $data['about'] = $this->db->get('about')->row_array();
        $data['product'] = $this->db->get('produk')->result_array();

        $this->load->view('template2/header', $data);
        $this->load->view('user/product', $data);
        $this->load->view('template2/footer');
    }

    public function detailProduct($id)
    {
        $data['title'] = 'product detail';
        $data['about'] = $this->db->get('about')->row_array();
        $data['product'] = $this->db->get_where('produk', ['id' => $id])->row_array();

        $this->load->view('template2/header', $data);
        $this->load->view('user/detailProduct', $data);
        $this->load->view('template2/footer');
    }

    //Contact
    public function contact()
    {
        $data['title'] = 'contact';
        $data['about'] = $this->db->get('about')->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('subject', 'Subject', 'required|trim');
        $this->form_validation->set_rules('content', 'Content', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template2/header', $data);
            $this->load->view('user/contact', $data);
            $this->load->view('template2/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $content = $this->input->post('content');
            $time = time();

            $data = [
                'name' => $name,
                'email' => $email,
                'subject' => $subject,
                'content' => $content,
                'time' => $time
            ];

            $this->db->insert('mail', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Pesan anda telah terkirim. Silahkan tunggu balasannya di email anda! </div>');
            redirect('user/contact');
        }
    }
}
