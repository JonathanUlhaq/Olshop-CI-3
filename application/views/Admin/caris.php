<?php if (empty($this->session->userdata('username'))) {
    header("location:http://localhost/CI_3/olshop/index.php/Autentikasi/index");
} ?>
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