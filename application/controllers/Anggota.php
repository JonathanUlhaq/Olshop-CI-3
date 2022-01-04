<?php

class Anggota extends CI_Controller
{
    public function index()
    {

        $keyword = "";
        $data = [
            'kategori' => $this->DataModel->getUsers($keyword),

        ];

        $this->load->view('Layout/header');
        $this->load->view('Layout/sidebar');
        $this->load->view('Admin/datauser', $data);
        $this->load->view('Layout/footer');
    }



    public function cari()
    {
        $id = $_GET['keyword'];

        $data = [
            'kategori' => $this->DataModel->getUsers($id),

        ];

        $this->load->view('Admin/carang', $data);
    }
}
