<body id="page-top">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tables Barang</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Barang</h6>
                </div>


                <div class="card-body">
                    <!-- Button trigger modal -->
                    <div style="display:flex;" class="sam">
                        <button type="button" style="margin-bottom: 1vw;" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            Tambah Data <i style="margin-left: 0.3vw;" class="fas fa-plus fa-lg"></i>
                        </button>
                        <label style="margin-left: 42.5vw;">Cari Barang :</label>
                        <input type="text" style="width:20vw;margin-left: 1vw;" class="form-control" autocomplete="off" name="keyword" id="keyword">
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url(); ?>Admin/tambah" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" required value="<?= set_value('nama_brng'); ?>" class="form-control" name="nama_brng">
                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan Barang</label>
                                            <input type="text" required value="<?= set_value('keterangan'); ?>" class="form-control" name="keterangan">
                                        </div>

                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" required name="kategori">
                                                <?php foreach ($kategori as $k) : ?>
                                                    <option value="<?= $k['id_kategori']; ?>"><?= $k['kategori']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text" required value="<?= set_value('harga'); ?>" class="form-control" name="harga">
                                        </div>

                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input type="text" required value="<?= set_value('stok'); ?>" class="form-control" name="stok">
                                        </div>


                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input type="file" required class="form-control" name="gambar">
                                        </div>
                                        <div style="margin-top: 1vw;" class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>


                                </div>

                            </div>
                        </div>
                    </div>


                    <?php if ($this->session->flashdata('gagalus')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo $this->session->flashdata('gagalus') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('gagal')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo $this->session->flashdata('gagal') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('berhasil')) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sukses!</strong> <?php echo $this->session->flashdata('berhasil') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>

                    <?php if ($this->session->flashdata('berhasils')) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sukses!</strong> <?php echo $this->session->flashdata('berhasils') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('suks')) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sukses!</strong> <?php echo $this->session->flashdata('suks') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <?php if (!empty($barang)) { ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody id="result">
                                    <?php foreach ($barang as $b) : ?>
                                        <tr>
                                            <td><?= $b['id_brng']; ?></td>
                                            <td><?= $b['nama_brng']; ?></td>
                                            <td>Rp. <?= number_format($b['harga'], 2, ",", "."); ?></td>
                                            <td><a onclick="return confirm('Apakah anda yakin ?')" href="<?= base_url(); ?>Admin/delete/<?= $b['id_brng']; ?>"><i style="color: red;" class="fas fa-trash fa-lg"></i></a>
                                                | <a href="<?= base_url(); ?>Admin/detail/<?= $b['id_brng']; ?>"><i class="fas fa-info-circle fa-lg"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
                        <h2>Tidak ada Data</h2>
                    <?php } ?>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <script>
        var keyword = document.getElementById('keyword')
        var result = document.getElementById('result')

        keyword.addEventListener('keyup', function() {
            var xhr = new XMLHttpRequest()
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    result.innerHTML = xhr.responseText
                }
            }
            xhr.open('GET', 'http://localhost/CI_3/olshop/index.php/Admin/cari?keyword=' + keyword.value, true);
            xhr.send();
        })
    </script>
    <!-- End of Main Content -->