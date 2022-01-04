<?php foreach ($jualan as $j) : ?>

    <div class="col">

        <div id="kartu" class="card h-100">
            <a style="text-decoration: none;" href="#">
                <img height="300vw" src="<?= base_url(); ?>assets/gambar/<?= $j['gambar']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 style="color: black;" class="card-title"><?= $j['nama_brng']; ?></h5>
                    <p style="color: rgb(243, 114, 114);" class="card-text"><?= $j['harga']; ?></p>
                </div>
            </a>
        </div>

    </div>

<?php endforeach ?>