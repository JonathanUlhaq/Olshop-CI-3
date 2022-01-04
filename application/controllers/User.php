<?php

class User extends CI_Controller
{
    public function index()
    {
        $keyword = "";

        $data = [
            'jualan' => $this->DataModel->jualan($keyword),

        ];

        $this->load->view('User/index', $data);
    }

    public function cari()
    {
        $keyword = $_GET['keyword'];

        $data = [
            'jualan' => $this->DataModel->jualan($keyword)
        ];

        $this->load->view('User/cari', $data);
    }

    public function add()
    {
        $data = array(
            'id'      => $this->input->post('id_brng'),
            'qty'     => 1,
            'price'   => $this->input->post('harga'),
            'name'    => $this->input->post('nama_brng'),
            'gambar' => $this->input->post('gambar'),
        );
        $this->cart->insert($data);
        redirect('User/index');
    }

    public function cek()
    {
        $response = $this->cart->contents();
        $data = json_encode($response);
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        $this->cart->destroy();
    }

    public function update()
    {
        $i = 1;

        foreach ($this->cart->contents() as $c) :
            $data = array(
                array(
                    'rowid'   => $c['rowid'],
                    'qty'     => $this->input->post('qty' . $i++)
                )
            );

        endforeach;

        $this->cart->update($data);

        redirect('User/index');
    }

    public function delete($id)
    {


        $this->cart->remove($id);
        redirect('User/index');
    }

    public function Checkout()
    {
        $ide = "TR" . rand(1000, 10000);
        $total = 0;
        foreach ($this->cart->contents() as $c) :
            $total = $total + $c['subtotal'];
            $data = [
                'atm' => $this->input->post('atm'),
                'id_transaksi' => $ide,
                'id_brng' => $c['id'],
                'jumlah_barang' => $c['qty'],
                'total_harga' => $total,
                'id_user' => $this->session->userdata('id_user'),
                'status' => 'Belum Bayar'
            ];

            $this->DataModel->tambah($data, 'transaksi');

        endforeach;

        $this->cart->destroy();

        $keyword = "";

        $data = [
            'jualan' => $this->DataModel->jualan($keyword),
            'tagihan' => $this->DataModel->getTagihan()
        ];

        $this->load->view('User/konfirmasi', $data);
    }

    public function deal($id)
    {
        $id = array('id_transaksi' => $id);


        $data = [
            'status' => 'Sudah Bayar'

        ];

        $this->DataModel->edits('transaksi', $id, $data);
        $this->session->set_flashdata('sukss', 'Barang berhasil dibayar');





        return redirect('User/index');
    }
}
