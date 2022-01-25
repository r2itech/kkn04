<?php

class dataCampur extends CI_Model
{
    public function mailSum()
    {
        $data['mailSum'] = $this->db->get_where('mail', ['readStatus' => 0]);
        if ($data['mailSum']->num_rows() > 0) {
            return $data['mailSum']->num_rows();
        } else {
            return 0;
        }
    }
    public function mailSumR()
    {
        $data['mailSum'] = $this->db->get_where('mail', ['readStatus' => 1]);
        if ($data['mailSum']->num_rows() > 0) {
            return $data['mailSum']->num_rows();
        } else {
            return 0;
        }
    }

    public function productSum()
    {
        $data['productSum'] = $this->db->get_where('produk');
        if ($data['productSum']->num_rows() > 0) {
            return $data['productSum']->num_rows();
        } else {
            return 0;
        }
    }

    public function profilDesa()
    {
        $data = $this->db->get('profildesa')->result_array();
        return $data;
    }

    public function profilUsaha()
    {
        $data = $this->db->get('profilusaha')->result_array();
        return $data;
    }
}
