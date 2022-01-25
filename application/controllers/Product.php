<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
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

    function file_selected_test()
    {
        $this->form_validation->set_message('file_selected_test', 'Please select file!');
        if (empty($_FILES['image']['name'])) {
            return false;
        } else {
            return true;
        }
    }
    public function index()
    {
        $data['title'] = 'Product';
        $data['user'] = $this->db->get_where('admin', ['status' => $this->session->userdata('username')])->row_array();
        $data['mailSum'] = $this->dataCampur->mailSum();

        $data['product'] = $this->db->get('produk')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('mp', 'Marekt Place', 'required|trim');
        $this->form_validation->set_rules('s1', 'Sosial Media 1', 'required|trim');
        $this->form_validation->set_rules('s2', 'Sosial Media 2', 'required|trim');
        $this->form_validation->set_rules('image', 'Image', 'callback_file_selected_test');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/product', $data);
            $this->load->view('template/footer');
        } else {
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');
            $mp = $this->input->post('mp');
            $s1 = $this->input->post('s1');
            $s2 = $this->input->post('s2');
            //Cek Image
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_sized'] = '5120';
                $config['upload_path'] = './assets/img/product/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['produk']['image'];
                    unlink(FCPATH . 'assets/img/product/' . $old_image);
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama' => $nama,
                'harga' => $harga,
                'deskripsi' => $deskripsi,
                'mp' => $mp,
                's1' => $s1,
                's2' => $s2
            ];

            $this->db->insert('produk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Produk Berhasil Ditambahkan </div>');
            redirect('product');
        }
    }

    public function updateProduct($id)
    {
        $data['title'] = 'Update Product';
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['mailSum'] = $this->dataCampur->mailSum();

        $data['product'] = $this->db->get_where('produk', ['id' => $id])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('mp', 'Marekt Place', 'required|trim');
        $this->form_validation->set_rules('s1', 'Sosial Media 1', 'required|trim');
        $this->form_validation->set_rules('s2', 'Sosial Media 2', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/updateProduct', $data);
            $this->load->view('template/footer');
        } else {
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');
            $mp = $this->input->post('mp');
            $s1 = $this->input->post('s1');
            $s2 = $this->input->post('s2');
            //Cek Image
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_sized'] = '5120';
                $config['upload_path'] = './assets/img/product/';

                $this->load->library('upload', $config);


                if ($this->upload->do_upload('image')) {
                    $old_image = $data['product']['image'];
                    unlink(FCPATH . 'assets/img/product/' . $old_image);
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama' => $nama,
                'harga' => $harga,
                'deskripsi' => $deskripsi,
                'mp' => $mp,
                's1' => $s1,
                's2' => $s2
            ];

            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('produk');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Produk Berhasil Diperbarui </div>');
            redirect('product');
        }
    }

    public function deleteProduct($id)
    {
        $data['product'] = $this->db->get_where('produk', ['id' => $id])->row_array();
        $old_image = $data['product']['image'];
        unlink(FCPATH . 'assets/img/product/' . $old_image);

        $this->db->where('id', $id);
        $this->db->delete('produk');
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Data Produk Telah Dihapus! </div>');
        redirect('product');
    }
}
