<!doctype html>
<html lang="en">

<style>
    #kartu:hover {
        border: 1px solid rgb(243, 114, 114);
        bottom: 5px;
        transition: 1s;
    }

    #kartu {
        bottom: 0px;
        transition: 1s;
    }

    .btn {
        margin-left: 55%;

    }
</style>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/userstyle/UserStyle.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ff677759a9.js" crossorigin="anonymous"></script>
    <title>ShopMag</title>
</head>

<body style="background-color:rgb(236, 236, 236);">
    <header>
        <nav style="background-color:rgb(228, 72, 72);" class="navbar fixed-top navbar-expand-lg navbar-dark ">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url(); ?>User/index">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="<?= base_url(); ?>User/checkout">Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <?php if (!empty($this->session->userdata('username'))) { ?>
                                <a class="nav-link " aria-current="page" href="<?= base_url(); ?>Autentikasi/logout">Logout</a>
                            <?php } else { ?>
                                <a class="nav-link " aria-current="page" href="<?= base_url(); ?>Autentikasi/index">Login</a>
                            <?php } ?>
                        </li>


                    </ul>
                </div>
                <br>

                <div class="d-flex flex-row bd-highlight mt-3 mb-3">
                    <div style="display: flex;" class="form-group">
                        <i style="margin-right: 5%; color: white;" class="fa fa-search mt-2"></i>
                        <input type="text" id="keyword" placeholder="Cari Barangmu" class="form-control " />
                    </div>
                    <?php if (!empty($this->cart->contents())) { ?>
                        <div style="margin-left: 8%;" class="cart  mt-1">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <i style="color: white;" class="fas fa-shopping-cart fa-lg"></i> <span class="position-absolute translate-middle badge rounded-pill bg-light">
                                    <?php
                                    $jum = 0;
                                    foreach ($this->cart->contents() as $c) :

                                        $jum = $jum + $c['qty'];
                                    endforeach ?>
                                    <span style="color: red;"> <?= $jum; ?></span>
                                    <span class="visually-hidden">unread messages</span></a>
                        </div>
                    <?php } else { ?>
                        <div style="margin-left: 8%;" class="cart  mt-1">
                            <a href="#"> <i style="color: white;" class="fab fa-creative-commons-zero fa-lg"></i></a>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </nav>
    </header>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Item Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url(); ?>User/update" method="POST">
                        <table class="table table-hover">
                            <tr>
                                <th>Qty</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Total Sub Item</th>
                                <th>Hapus</th>
                            </tr>
                            <?php $total = 0;
                            $i = 1; ?>

                            <?php foreach ($this->cart->contents() as $c) :
                                $total = $total + $c['subtotal']; ?>

                                <tr>
                                    <td><input class="form-control" style="width: 80px;" type="number" value="<?= $c['qty']; ?>" name="qty<?= $i++; ?>"> </td>
                                    <td><?= $c['name']; ?></td>
                                    <td><?= $c['price']; ?></td>
                                    <td>Rp. <?= number_format($c['subtotal'], '2', ',', '.'); ?></td>
                                    <td><a href="<?= base_url(); ?>User/delete/<?= $c['rowid']; ?>"><i style="color: red;" class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            <?php endforeach ?>

                        </table>
                </div>
                <h6 style="margin-left: 20px;">Total : <strong>Rp. <?= number_format($total, '2', ',', '.'); ?></strong></h6>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#staticBackdropes" class="btn btn-primary">Checkout</a>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdropes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Konfirmas Pembelian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url(); ?>User/checkout" method="POST">
                        <table class="table table-hover">
                            <tr>
                                <th>Qty</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Total Sub Item</th>
                            </tr>
                            <?php $total = 0;
                            $i = 1; ?>

                            <?php foreach ($this->cart->contents() as $c) :
                                $total = $total + $c['subtotal']; ?>

                                <tr>
                                    <td><?= $c['qty']; ?> </td>
                                    <td><?= $c['name']; ?></td>
                                    <td><?= $c['price']; ?></td>
                                    <td>Rp. <?= number_format($c['subtotal'], '2', ',', '.'); ?></td>
                                </tr>
                            <?php endforeach ?>

                        </table>
                </div>
                <?php $rand =  rand(1000, 10000); ?>
                <h6 style="margin-left: 20px;">Total : <strong>Rp. <?= number_format($total, '2', ',', '.'); ?></strong></h6>
                <h5 style="margin-left: 20px;">Tranfer ke : <strong><?= $rand ?></strong></h5>
                <input type="hidden" name="atm" value="<?= $rand; ?>">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <main>
        <div class="baner">
            <div class="container">
                <div class="diskon">
                    <div class="col-8">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?= base_url(); ?>assets/gambar/banner1.png" class="d-block w-100 mb-3 mt-3" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= base_url(); ?>assets/gambar/banner3.jpg" class="d-block w-100 mb-3 mt-3" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= base_url(); ?>assets/gambar/banner3.jpg" class="d-block w-100 mb-3 mt-3" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-5">
                        <img src="<?= base_url(); ?>assets/gambar/banner1.png" id="sampingan" width="75%" class="  mb-3 mt-3" alt="...">
                        <img src="<?= base_url(); ?>assets/gambar/banner1.png" id="sampingans" width="75% " class=" mb-3 " alt="...">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <?php if ($this->session->flashdata('sukss')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> <?php echo $this->session->flashdata('sukss') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <span aria-hidden="true">&times;</span>
                    <?php $this->session->unset_userdata('sukss'); ?>
                    </button>

                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('logout')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> <?php echo $this->session->flashdata('logout') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <span aria-hidden="true">&times;</span>
                    <?php $this->session->unset_userdata('logout'); ?>
                    </button>

                </div>
            <?php } ?>

            <div class="header-card">
                <h3 style="font-size: 20px;"> Barang Trendi</h3>
            </div>



            <div id="result" class="row row-cols-1 row-cols-md-4 g-3">
                <?php foreach ($jualan as $j) : ?>

                    <div class="col">

                        <div id="kartu" class="card h-100">

                            <?php if (!empty($this->session->userdata('username'))) { ?>
                                <form action="<?= base_url(); ?>User/add" method="POST">
                                    <input type="hidden" name="id_brng" value="<?= $j['id_brng']; ?>">
                                    <input type="hidden" name="nama_brng" value="<?= $j['nama_brng']; ?>">
                                    <input type="hidden" name="harga" value="<?= $j['harga']; ?>">
                                    <input type="hidden" name="gambar" value="<?= $j['gambar']; ?>">
                                    <img height="300vw" src="<?= base_url(); ?>assets/gambar/<?= $j['gambar']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 style="color: black;" class="card-title"><?= $j['nama_brng']; ?></h5>
                                        <p style="color: rgb(243, 114, 114);" class="card-text"><?= $j['harga']; ?></p>
                                    </div>

                                    <input type="submit" class="btn btn-danger  mb-3" value="Tambah">
                                </form>
                            <?php } ?>
                            <?php if (empty($this->session->userdata('username'))) { ?>
                                <form action="<?= base_url(); ?>Autentikasi/index" method="POST">
                                    <input type="hidden" name="id_brng" value="<?= $j['id_brng']; ?>">
                                    <input type="hidden" name="nama_brng" value="<?= $j['nama_brng']; ?>">
                                    <input type="hidden" name="harga" value="<?= $j['harga']; ?>">
                                    <input type="hidden" name="gambar" value="<?= $j['gambar']; ?>">
                                    <img height="300vw" src="<?= base_url(); ?>assets/gambar/<?= $j['gambar']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 style="color: black;" class="card-title"><?= $j['nama_brng']; ?></h5>
                                        <p style="color: rgb(243, 114, 114);" class="card-text"><?= $j['harga']; ?></p>
                                    </div>

                                    <input type="submit" class="btn btn-danger  mb-3" value="Tambah">
                                </form>
                            <?php } ?>
                        </div>

                    </div>

                <?php endforeach ?>

            </div>

        </div>

    </main>

    <script>
        var keyword = document.getElementById('keyword')
        var tempat = document.getElementById('result')

        keyword.addEventListener('keyup', function() {
            xhr = new XMLHttpRequest()

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    tempat.innerHTML = xhr.responseText
                }
            }
            xhr.open('GET', 'http://localhost/CI_3/olshop/User/cari?keyword=' + keyword.value, true)
            xhr.send()
        })
    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>