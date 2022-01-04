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