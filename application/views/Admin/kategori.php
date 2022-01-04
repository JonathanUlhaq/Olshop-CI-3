<body id="page-top">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"> Kategori</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Kategori</h6>
                </div>


                <div class="card-body">
                    <!-- Button trigger modal -->
                    <div style="display:flex;" class="sam">
                        <button type="button" style="margin-bottom: 1vw;" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            Tambah Data <i style="margin-left: 0.3vw;" class="fas fa-plus fa-lg"></i>
                        </button>
                        <label style="margin-left: 42.5vw;">Cari Barang :</label>
                        <input type="text" style="width:20vw;margin-left: 1vw;" autocomplete="off" class="form-control" name="keyword" id="keyword">
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
                                    <form action="<?= base_url(); ?>Kategori/tambah" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Id Kategori</label>
                                            <input type="text" value="<?= set_value('id_kategori'); ?>" class="form-control" name="id_kategori">
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Kategori</label>
                                            <input type="text" value="<?= set_value('nama_kategori'); ?>" class="form-control" name="nama_kategori">
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


                    <?php if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo $this->session->flashdata('error') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('sukses')) { ?>
                        <div class="alert alert-success alert-success fade show" role="alert">
                            <strong>Berhasil!</strong> <?php echo $this->session->flashdata('sukses') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('suks')) { ?>
                        <div class="alert alert-success alert-success fade show" role="alert">
                            <strong>Berhasil!</strong> <?php echo $this->session->flashdata('suks') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('berhasils')) { ?>
                        <div class="alert alert-success alert-success fade show" role="alert">
                            <strong>Berhasil!</strong> <?php echo $this->session->flashdata('berhasils') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <div class="table-responsive table-hover">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id Kategori</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id Kategori</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody id="result">
                                <?php foreach ($kategori as $k) : ?>
                                    <tr>
                                        <td><?= $k['id_kategori']; ?></td>
                                        <td><?= $k['kategori']; ?></td>
                                        <td><a onclick="return confirm('Apakah anda yakin ?')" href="<?= base_url(); ?>Kategori/delete/<?= $k['id_kategori']; ?>"><i style="color: red;" class="fas fa-trash "></i></a>
                                            | <a href="" data-toggle="modal" data-target="#sstaticBackdrop<?= $k['id_kategori']; ?>"><i class="fas fa-edit "></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php foreach ($kategori as $k) : ?>
                <div class="modal fade" id="sstaticBackdrop<?= $k['id_kategori']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url(); ?>Kategori/ubah/<?= $k['id_kategori']; ?>" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Id Kategori</label>
                                        <input type="text" value="<?= $k['id_kategori']; ?>" class="form-control" name="id_kategori">
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Kategori</label>
                                        <input type="text" value="<?= $k['kategori']; ?>" class="form-control" name="kategori">
                                    </div>


                                    <div style="margin-top: 1vw;" class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                    </div>
                                </form>


                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach ?>
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
            xhr.open('GET', 'http://localhost/CI_3/olshop/index.php/Kategori/cari?keyword=' + keyword.value, true);
            xhr.send();
        })
    </script>
    <!-- End of Main Content -->