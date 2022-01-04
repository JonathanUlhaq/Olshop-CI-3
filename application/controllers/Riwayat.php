<?php

class Riwayat extends CI_Controller
{
    public function index($id = "")
    {
        $id = array('id_riwayat', $id);
        $keyword = "";
        $data = [
            'kategori' => $this->DataModel->getRiwayat($keyword),

        ];

        $this->load->view('Layout/header');
        $this->load->view('Layout/sidebar');
        $this->load->view('Admin/riwayat', $data);
        $this->load->view('Layout/footer');
    }

    public function detail($id)
    {


        $data = [
            'kategori' => $this->DataModel->detailRiw($id),

        ];

        $this->load->view('Layout/header');
        $this->load->view('Layout/sidebar');
        $this->load->view('Admin/detriw', $data);
        $this->load->view('Layout/footer');
    }

    public function cari()
    {
        $id = $_GET['keyword'];

        $data = [
            'kategori' => $this->DataModel->getRiwayat($id),

        ];

        $this->load->view('Admin/caris', $data);
    }
}
