<body id="page-top">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Riwayat</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Riwayat</h6>
                </div>


                <div class="card-body">
                    <div style="display: flex;" class="flex mb-3">
                        <label style="margin-left: 1vw;">Cari Riwayat Transaksi :</label>
                        <input type="text" style="width:20vw; margin-left: 1vw;" autocomplete="off" class="form-control" name="keyword" id="keyword">
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
                    <?php if (!empty($kategori)) { ?>
                        <div class="table-responsive table-hover">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id Transaksi</th>
                                        <th>Nama User</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id Transaksi</th>
                                        <th>Nama User</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody id="result">
                                    <?php foreach ($kategori as $b) : ?>
                                        <tr>
                                            <td><?= $b['id_transaksi']; ?></td>
                                            <td><?= $b['nama']; ?></td>
                                            <td><?= $b['status']; ?></td>
                                            <td>
                                                <a href="<?= base_url(); ?>Riwayat/detail/<?= $b['id_transaksi']; ?>"><i class="fas fa-info-circle fa-lg"></i></a>
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
            xhr.open('GET', 'http://localhost/CI_3/olshop/index.php/Riwayat/cari?keyword=' + keyword.value, true);
            xhr.send();
        })
    </script>
    <!-- End of Main Content -->