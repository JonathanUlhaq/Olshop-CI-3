<?php

class Admin extends CI_Controller
{
    public function index()
    {

        $data = [
            'jumbar' => $this->DataModel->jumBarang()
        ];

        $this->load->view('Layout/header');
        $this->load->view('Layout/sidebar');
        $this->load->view('Admin/index', $data);
        $this->load->view('Layout/footer');
    }

    public function table()
    {
        $keyword = "";
        $keywords = "";
        $data = [
            'barang' => $this->DataModel->getData('tb_barang', $keyword),
            'kategori' => $this->DataModel->getKategori($keywords)
        ];

        $this->load->view('Layout/header');
        $this->load->view('Layout/sidebar');
        $this->load->view('Admin/table', $data);
        $this->load->view('Layout/footer');
    }

    public function tambah()
    {
        $gambar = $_FILES['gambar'];

        if (!empty($gambar)) {
            $config['upload_path'] = './assets/gambar';
            $config['allowed_types'] = 'jpg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload(('gambar'))) {
                $this->session->set_flashdata('gagal', 'gambar produk gagal diupload');
                return redirect('Admin/table');
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $this->form_validation->set_rules('nama_brng', 'Nama Barang', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan Barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga Barang', 'required|integer');
        $this->form_validation->set_rules('stok', 'Stok Barang', 'required|integer');

        $this->form_validation->set_message('required', '%s Mohon diisi');
        $this->form_validation->set_message('integer', '%s Mohon diisi angka ');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagalus', validation_errors());
            return redirect('Admin/table');
        } else {
            $random = rand(100, 10000);
            $id = "BRNG_$random";
            $data = [
                'id_brng' => $id,
                'nama_brng' => $this->input->post('nama_brng'),
                'keterangan' => $this->input->post('keterangan'),
                'kategori' => $this->input->post('kategori'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'gambar' => $gambar
            ];

            $this->DataModel->tambah($data, 'tb_barang');
            $this->session->set_flashdata('berhasil', 'Data Berhasil Disimpan');
            return redirect('Admin/table');
        }
    }

    public function delete($id)
    {
        $id = array('id_brng' => $id);

        $this->DataModel->deletes($id, 'tb_barang');

        $this->session->set_flashdata('suks', 'Data berhasil dihapus');

        return redirect('Admin/table');
    }

    public function cari()
    {
        $keyword = $_GET['keyword'];

        $data = [
            'barang' => $this->DataModel->getData('tb_barang', $keyword)
        ];

        $this->load->view('Admin/isi', $data);
    }

    public function detail($id)
    {
        $id = array('id_brng' => $id);

        $data = [
            'info' => $this->DataModel->detail($id)
        ];


        $this->load->view('Layout/header');
        $this->load->view('Layout/sidebar');
        $this->load->view('Admin/info', $data);
        $this->load->view('Layout/footer');
    }

    public function edit($id)
    {
        $id = array('id_brng' => $id);

        $gambar = $_FILES['gambar'];
        if (!empty($gambar)) {
            $config['allowed_types'] = 'jpg|png';
            $config['upload_path'] = './assets/gambar/';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('eror', 'Gambar gagal diupload');
            } else {
                $gambar = $this->upload->data('file_name');
            }
        } else {
            $this->session->set_flashdata('eror', 'Gambar gagal diupload');
        }

        $this->form_validation->set_rules('nama_brng', 'Nama Barang', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan Barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga Barang', 'required|integer');
        $this->form_validation->set_rules('stok', 'Stok Barang', 'required|integer');


        $this->form_validation->set_message('required', '%s Mohon diisi');
        $this->form_validation->set_message('integer', '%s Mohon diisi angka ');

        if ($this->form_validation->run() == false && empty($gambar)) {
            $this->session->set_flashdata('error', validation_errors());
            return redirect('Admin/detail/' . $id);
        } else {
            $data = [
                'nama_brng' => $this->input->post('nama_brng'),
                'keterangan' => $this->input->post('keterangan'),
                'kategori' => $this->input->post('kategori'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'gambar' => $gambar
            ];

            $this->DataModel->edits('tb_barang', $id, $data);
            $this->session->set_flashdata('berhasils', 'Data Berhasil Diubah');
            return redirect('Admin/table');
        }
    }
}
