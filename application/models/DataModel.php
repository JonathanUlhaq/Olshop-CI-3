<?php

class DataModel extends CI_Model
{
    public function getData($table, $keyword)
    {
        if ($keyword == "") {
            return $this->db->get($table)->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('tb_barang');
            $this->db->like('nama_brng', $keyword);
            $this->db->or_like('id_brng', $keyword);
            $this->db->or_like('harga', $keyword);
            return $this->db->get()->result_array();
        }
    }
    public function getKategori($keyword)
    {
        if ($keyword == "") {
            return $this->db->get('kategori')->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('kategori');
            $this->db->like('id_kategori', $keyword);
            $this->db->or_like('kategori', $keyword);
            return $this->db->get()->result_array();
        }
    }

    public function detailRiw($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id);
        $this->db->join('user', 'user.id_user=transaksi.id_user');
        $this->db->join('tb_barang', 'tb_barang.id_brng=transaksi.id_brng');
        return $this->db->get()->result_array();
    }

    public function getUsers($keyword)
    {
        if ($keyword == "") {
            return $this->db->get('user')->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->like('username', $keyword);
            $this->db->or_like('nama', $keyword);
            $this->db->or_like('id_user', $keyword);
            return $this->db->get()->result_array();
        }
    }

    public function getRiwayat($keyword)
    {
        if ($keyword == "") {
            $this->db->select('*');
            $this->db->from('transaksi');
            $this->db->join('user', 'user.id_user=transaksi.id_user');
            $this->db->join('tb_barang', 'tb_barang.id_brng=transaksi.id_brng');
            $this->db->group_by('id_transaksi');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('transaksi');
            $this->db->join('user', 'user.id_user=transaksi.id_user');
            $this->db->join('tb_barang', 'tb_barang.id_brng=transaksi.id_brng');
            $this->db->like('user.username', $keyword);
            $this->db->or_like('tb_barang.nama_brng', $keyword);
            $this->db->or_like('transaksi.id_transaksi', $keyword);
            $this->db->group_by('id_transaksi');
            return $this->db->get()->result_array();
        }
    }

    public function getTagihan()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('tb_barang', 'tb_barang.id_brng=transaksi.id_brng');
        $this->db->where('status', 'Belum Bayar');
        return $this->db->get()->result_array();
    }

    public function getEditKat($keyword)
    {
        if ($keyword == "") {
            return $this->db->get('kategori')->result_array();
        } else {
            return $this->db->get_where('id_kategori', $keyword)->result_array();
        }
    }

    public function tambah($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function deletes($id, $table)
    {
        $this->db->where($id);
        $this->db->delete($table);
    }

    public function detail($id)
    {
        return $this->db->get_where('tb_barang', $id)->row_array();
    }

    public function edits($tabel, $id, $data)
    {
        $this->db->where($id);
        $this->db->update($tabel, $data);
    }

    public function jumBarang()
    {
        return $this->db->count_all_results('tb_barang');
    }

    public function jualan($keyword)
    {
        if ($keyword == "") {
            $this->db->select('*');
            $this->db->from('tb_barang');
            $this->db->join('kategori', 'kategori.id_kategori=tb_barang.kategori');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('tb_barang');
            $this->db->join('kategori', 'kategori.id_kategori=tb_barang.kategori');
            $this->db->like('tb_barang.nama_brng', $keyword);
            $this->db->or_like('tb_barang.harga', $keyword);
            $this->db->or_like('kategori.kategori', $keyword);
            return $this->db->get()->result_array();
        }
    }

    public function registrasi($data)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $data['username']);
        $this->db->limit(1);
        $query = $this->db->get()->num_rows();
        if ($query == 0) {
            $this->db->insert('user', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                false;
            }
        }
    }

    public function role($data)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(['username' => $data['username'], 'password' => $data['password']]);
        return $this->db->get()->row_array();
    }

    public function login($data)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(['username' => $data['username'], 'password' => $data['password']]);
        $query = $this->db->get()->num_rows();
        if ($query == 1) {
            return true;
        } else {
            return false;
        }
    }
}
