<!doctype html>
<html lang="en">

<style>
    main {
        background-color: #f06546;
    }

    .logos {
        color: white;
    }
</style>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ff677759a9.js" crossorigin="anonymous"></script>
    <title>ShopMag</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Log in Member ShopMag</span>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <div style="display: flex;" class="isi">

                <div class="col-6 text-center">
                    <div style="margin-top: 25%;margin-bottom:15%; margin-left: 5%;margin-right: 20%;" class="logos">
                        <i class="fas fa-store-alt fa-7x"></i>
                        <h2>ShopMag</h2>
                        <h5>Online Shop Terbaik di Magetan</h5>
                    </div>
                </div>
                <div class="col-6 ">
                    <div style="margin-top: 15%;margin-bottom: 15%; margin-right: 5%;margin-left: 20%;" class="logos">

                        <div id="result" class="card" style="width: 100%; color: black">

                            <div class="card-body">
                                <form action="<?= base_url(); ?>Autentikasi/process_register" method="POST">
                                    <h5 style="padding-bottom: 10%;" class="card-title">Register</h5>
                                    <p style="padding-bottom: 5%;" class="card-text"><label>Username</label><input required type="text" name="username" class="form-control"></p>
                                    <p style="padding-bottom: 5%;" class="card-text"><label>Nama</label><input required type="text" name="nama" class="form-control"></p>
                                    <p style="padding-bottom: 1%;" class="card-text"><label>Password</label><input required type="password" name="password" class="form-control"></p>
                                    <p style="padding-bottom: 1%;" class="card-text"><label>Konfirmasi Password</label><input required type="password" name="passcom" class="form-control"></p>
                                    <input type="submit" class="btn btn-danger form-control" value="Daftar">
                                    <a style="font-size: 80%;" href="<?= base_url(); ?>Autentikasi/index">Sudah Punya Akun</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <h6 style="margin-top: 2%;">Dibuat oleh Jovian</h6>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->
    <script>
        var daftar = document.getElementById('daftar')
        var result = document.getElementById('result')

        daftar.addEventListener('click', function() {
            var xhr = new XMLHttpRequest()

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    result.innerHTML = xhr.responseText
                }
            }

            xhr.open('GET', 'http://localhost/CI_3/olshop/Autentikasi/register', true)
            xhr.send()
        })
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>