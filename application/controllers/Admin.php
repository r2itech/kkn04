<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['mailSum'] = $this->dataCampur->mailSum();
        $data['mailSumR'] = $this->dataCampur->mailSumR();
        $data['productSum'] = $this->dataCampur->productSum();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }

    public function editProfile()
    {
        $data['title'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['mailSum'] = $this->dataCampur->mailSum();

        if ($this->input->post('username') == $data['user']['username']) {
            $this->form_validation->set_rules('username', 'Username', 'trim');
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]', [
                'is_unique' => 'Username ini telah digunakan, silahkan gunakan username lain!'
            ]);
        }
        $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('telp', 'No. Telephone', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/editProfil', $data);
            $this->load->view('template/footer');
        } else {
            $id = $this->input->post('id');
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
            $telp = $this->input->post('telp');

            //Cek Image
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_sized'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = ['username' => $username, 'nama' => $nama, 'telp' => $telp];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('admin');

            $data = [
                'username' => $username
            ];
            $this->session->set_userdata($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Profil berhasil diperbarui </div>');
            redirect('admin/editProfile');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['mailSum'] = $this->dataCampur->mailSum();

        $this->form_validation->set_rules('current_password', 'Password Sebelumnya', 'required|trim', [
            'required' => 'Masukan Password Sebelumnya'
        ]);
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[3]', [
            'required' => 'Masukan Password Baru',
            'min_length' => 'Panjang Password Minimal 3 Karakter'
        ]);
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|matches[new_password1]', [
            'required' => 'Masukan Ulang Password Baru',
            'matches' => 'Pengetikan Ulang Password Salah!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/editPassword', $data);
            $this->load->view('template/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Lama Salah! </div>');
                redirect('admin/changePassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Baru Tidak Boleh Sama dengan Password Sebelumnya! </div>');
                    redirect('admin/changePassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('status', $this->session->userdata('status'));
                    $this->db->update('admin');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password berhasil diperbaharui </div>');
                    redirect('admin/editProfile');
                }
            }
        }
    }

    public function user()
    {
        if ($this->session->userdata('status') != 'admin') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Anda tidak punya hak akses ke halaman tersebut!!! </div>');
            redirect('admin');
        }

        $data['title'] = 'User';
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['mailSum'] = $this->dataCampur->mailSum();

        $data['users'] = $this->db->get_where('admin', ['status' => 'pengelola'])->result_array();

        $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]', [
            'is_unique' => 'Username ini telah digunakan, silahkan gunakan username lain!'
        ]);
        $this->form_validation->set_rules('telp', 'No. Telephone', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/user', $data);
            $this->load->view('template/footer');
        } else {
            $nama = $this->input->post('nama');
            $telp = $this->input->post('telp');
            $image = 'default.png';
            $status = $this->input->post('status');
            $username = $this->input->post('username');
            //$data['admin'] = $this->db->query('select username from admin')->result_array();

            $password = $status;
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $data = ['nama' => $nama, 'telp' => $telp, 'image' => $image, 'username' => $username, 'password' => $password_hash, 'status' => $status];
            $this->db->insert('admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> User berhasil ditambahkan </div>');
            redirect('admin/user');
        }
    }

    public function updateUser($id)
    {
        if ($this->session->userdata('status') != 'admin') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Anda tidak punya hak akses ke halaman tersebut!!! </div>');
            redirect('admin');
        }

        $data['title'] = 'User';
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['mailSum'] = $this->dataCampur->mailSum();

        $data['users'] = $this->db->get_where('admin', ['id' => $id])->row_array();

        $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('telp', 'No. Telephone', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        if ($this->input->post('username') == $data['users']['username']) {
            $this->form_validation->set_rules('username', 'Username', 'trim');
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]', [
                'is_unique' => 'Username ini telah digunakan, silahkan gunakan username lain!'
            ]);
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/updateUser', $data);
            $this->load->view('template/footer');
        } else {
            $nama = $this->input->post('nama');
            $telp = $this->input->post('telp');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $status = $this->input->post('status');

            //Cek Image
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_sized'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['users']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            if ($password == "") {
                $data = ['nama' => $nama, 'telp' => $telp, 'username' => $username, 'status' => $status];
            } else {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $data = ['nama' => $nama, 'telp' => $telp, 'username' => $username, 'password' => $password_hash, 'status' => $status];
            }
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('admin');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data User berhasil diperbarui </div>');
            redirect('admin/user');
        }
    }

    public function deleteUser($id)
    {
        if ($this->session->userdata('status') != 'admin') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Anda tidak punya hak akses ke halaman tersebut!!! </div>');
            redirect('admin');
        }

        $data['admin'] = $this->db->get_where('admin', ['id' => $id])->row_array();
        $old_image = $data['admin']['image'];
        if ($old_image != 'default.png') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
        }

        $this->db->where('id', $id);
        $this->db->delete('admin');
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> User telah berhasil dihapus! </div>');
        redirect('admin/user');
    }

    public function info()
    {
        $data['title'] = 'Info';
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['mailSum'] = $this->dataCampur->mailSum();

        $data['about'] = $this->db->get('about')->row_array();

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('content', 'Content', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/info', $data);
            $this->load->view('template/footer');
        } else {
            $id = $this->input->post('id');
            $title = $this->input->post('title');
            $content = $this->input->post('content');
            $telp = $this->input->post('telp');
            $email = $this->input->post('email');
            //Cek Image
            $upload_image1 = $_FILES['image1']['name'];
            if ($upload_image1) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_sized'] = '5120';
                $config['upload_path'] = './assets/img/about/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image1')) {
                    $old_image = $data['about']['image1'];
                    if ($old_image != 'logoKKN04.png') {
                        unlink(FCPATH . 'assets/img/about/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image1', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $upload_image2 = $_FILES['image2']['name'];
            if ($upload_image2) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_sized'] = '5120';
                $config['upload_path'] = './assets/img/about/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image2')) {
                    $old_image = $data['about']['image2'];
                    if ($old_image != 'icon.png') {
                        unlink(FCPATH . 'assets/img/about/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image2', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = ['title' => $title, 'in_content' => $content, 'content' => $content, 'telp' => $telp, 'email' => $email];
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('about');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Info berhasil diperbarui </div>');
            redirect('admin/info');
        }
    }

    public function mail()
    {
        $data['title'] = 'Mail';
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['mailSum'] = $this->dataCampur->mailSum();

        $data['mail'] = $this->db->get('mail')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/mail', $data);
        $this->load->view('template/footer');
    }

    public function readMail($id)
    {
        $data = ['readStatus' => 1];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('mail');

        $data['title'] = 'Read Mail';
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['mailSum'] = $this->dataCampur->mailSum();

        $data['mail'] = $this->db->get_where('mail', ['id' => $id])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/readMail', $data);
        $this->load->view('template/footer');
    }

    public function deleteMail($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mail');
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Pesan telah berhasil dihapus! </div>');
        redirect('admin/mail');
    }
}
