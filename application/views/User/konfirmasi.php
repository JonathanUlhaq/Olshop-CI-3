<?php if (empty($this->session->userdata('username'))) {
    header("location:http://localhost/CI_3/olshop/index.php/Autentikasi/index");
} ?>

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
                            <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>User/checkout">Pesanan</a>
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


    </div>

    <main>

        <br>
        <br>
        <div class="container">

            <div class="header-card">
                <h3>BARANG</h3>
            </div>

            <div class="card">

                <?php if (!empty($tagihan)) { ?>

                    <table class="table table-hover ">
                        <tr class="text-center">
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga Subitem</th>
                        </tr>
                        <?php $jum = 0;
                        foreach ($tagihan as $t) :
                            $jum = $jum + $t['total_harga'];
                            $trans = $t['atm'];
                            $idt = $t['id_transaksi']; ?>
                            <tr class="text-center">
                                <td><?= $t['nama_brng']; ?></td>
                                <td><?= $t['jumlah_barang']; ?></td>
                                <td><?= number_format($t['harga'], '2', ',', '.'); ?></td>
                                <td><?= number_format($t['total_harga'], '2', ',', '.'); ?></td>
                            </tr>
                        <?php endforeach ?>

                        <tr class="text-center">
                            <th>Total Harga : <strong><?= $jum; ?></strong></th>
                            <th>No. Transfer : <strong><?= $trans; ?></strong></th>
                            <th>
                            <th>
                        </tr>

                    </table>

                    <form style="margin-left: 40vw;" class="mb-3 mt-3" action="<?= base_url(); ?>User/deal/<?= $idt; ?>" method="post">
                        <button type="submit" class="btn btn-primary"> Transfer Sekarang </button>
                    </form>

                <?php } else { ?>
                    <h4 class="text-center">Anda tidak memiliki tagihan pesanan</h4>
                <?php } ?>
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