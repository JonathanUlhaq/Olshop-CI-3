<body id="page-top">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Table Detail Barang</h1>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Detail Barang</h6>
                </div>

                <div class="card-body">
                    <?php if ($this->session->flashdata('eror')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo $this->session->flashdata('eror') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> <?php echo $this->session->flashdata('error') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                        <div class="table-responsive table-hover">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Keterangan</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Gambar</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Keterangan</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Gambar</th>
                                    </tr>
                                </tfoot>
                                <tbody id="result">

                                    <tr>
                                        <td><?= $info['id_brng']; ?></td>
                                        <td><?= $info['nama_brng']; ?></td>
                                        <td><?= $info['keterangan']; ?></td>
                                        <td><?= $info['kategori']; ?></td>
                                        <td><?= $info['harga']; ?></td>
                                        <td><?= $info['stok']; ?></td>
                                        <td><img width="50px" src="<?= base_url(); ?>assets/gambar/<?= $info['gambar']; ?>"></td>

                                    </tr>


                                </tbody>
                            </table>
                            <div style="display: flex;" class="felex">
                                <a href="<?= base_url(); ?>Admin/table" class="btn btn-danger">Kembali</a>
                                <button type="button" style="margin-left: 0.5vw;" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                                    Edit Data <i style="margin-left: 0.3vw;" class="fas fa-edit "></i>
                                </button>
                            </div>
                        </div>
                    </div>


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
                                    <form action="<?= base_url(); ?>Admin/edit/<?= $info['id_brng']; ?>" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" required value="<?= $info['nama_brng'] ?>" class="form-control" name="nama_brng">
                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan Barang</label>
                                            <input type="text" required value="<?= $info['keterangan'] ?>" class="form-control" name="keterangan">
                                        </div>

                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori">
                                                <option value="Makanan">Makanan</option>
                                                <option value="Makanan">Makanan</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text" required value="<?= $info['harga'] ?>" class="form-control" name="harga">
                                        </div>

                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input type="text" required value="<?= $info['stok'] ?>" class="form-control" name="stok">
                                        </div>


                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input required type="file" class="form-control" name="gambar">
                                        </div>
                                        <div style="margin-top: 1vw;" class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                    </form>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>

        <!-- End of Main Content -->