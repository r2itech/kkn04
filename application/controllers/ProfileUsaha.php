<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileUsaha extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('status')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Anda Belum Login, Silahkan Login Terlebih Dahulu! </div>');
            redirect('auth');
        }

        $this->load->model('dataCampur');
    }

    public function index()
    {
        $data['title'] = 'Profil Wirausaha';
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['mailSum'] = $this->dataCampur->mailSum();
        $data['profile'] = $this->dataCampur->profilUsaha();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/profilUsaha', $data);
        $this->load->view('template/footer');
    }

    public function updateProfile($id)
    {
        $data['title'] = 'Update Profil Wirausaha';
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['mailSum'] = $this->dataCampur->mailSum();
        $data['profilusaha'] = $this->db->get_where('profilusaha', ['id' => $id])->row_array();

        $this->form_validation->set_rules('content', 'Content', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/updateProfilUsaha', $data);
            $this->load->view('template/footer');
        } else {
            $content = $this->input->post('content');
            //Cek Image
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_sized'] = '5120';
                $config['upload_path'] = './assets/img/profileUsaha/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['profilusaha']['image'];
                    unlink(FCPATH . 'assets/img/profileUsaha/' . $old_image);
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = ['content' => $content];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('profilusaha');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Profil Wirausaha berhasil diperbarui </div>');
            redirect('ProfileUsaha');
        }
    }
}
