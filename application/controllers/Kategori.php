<?php

class Kategori extends CI_Controller
{
    public function index($id = "")
    {
        $id = array('id_kategori', $id);
        $keyword = "";
        $data = [
            'kategori' => $this->DataModel->getKategori($keyword),

        ];

        $this->load->view('Layout/header');
        $this->load->view('Layout/sidebar');
        $this->load->view('Admin/kategori', $data);
        $this->load->view('Layout/footer');
    }

    public function cari()
    {
        $keyword = $_GET['keyword'];
        $data = [
            'kategori' => $this->DataModel->getKategori($keyword)
        ];


        $this->load->view('Admin/hasil', $data);
    }

    public function delete($id)
    {
        $id = array('id_kategori' => $id);

        $this->DataModel->deletes($id, 'kategori');

        $this->session->set_flashdata('suks', 'Data berhasil dihapus');
        return redirect('Kategori/index');
    }


    public function tambah()
    {
        $this->form_validation->set_rules('id_kategori', 'Id Kategori', 'required');
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error' . validation_errors());
            return redirect('Kategori/index');
        } else {
            $data = [
                'id_kategori' => $this->input->post('id_kategori'),
                'kategori' => $this->input->post('nama_kategori'),
            ];
            $this->DataModel->tambah($data, 'kategori');

            $this->session->set_flashdata('sukses', 'Data Berhasil disimpan');
            return redirect('Kategori/index');
        }
    }

    public function ubah($id)
    {
        $id = array('id_kategori' => $id);



        $this->form_validation->set_rules('id_kategori', 'Id Kategori', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');



        $this->form_validation->set_message('required', '%s Mohon diisi');


        if ($this->form_validation->run() == false && empty($gambar)) {
            $this->session->set_flashdata('error', validation_errors());
            return redirect('Kategori/index');
        } else {
            $data = [
                'id_kategori' => $this->input->post('id_kategori'),
                'kategori' => $this->input->post('kategori'),

            ];

            $this->DataModel->edits('kategori', $id, $data);
            $this->session->set_flashdata('berhasils', 'Data Berhasil Diubah');
            return redirect('Kategori/index');
        }
    }
}
