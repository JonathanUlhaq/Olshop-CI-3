<?php if (empty($this->session->userdata('username'))) {
    header("location:http://localhost/CI_3/olshop/index.php/Autentikasi/index");
} ?>

<tbody id="result">
    <?php foreach ($kategori as $k) : ?>
        <tr>
            <td><?= $k['id_kategori']; ?></td>
            <td><?= $k['kategori']; ?></td>
            <td><a onclick="return confirm('Apakah anda yakin ?')" href="<?= base_url(); ?>Admin/deletekat/<?= $k['id_kategori']; ?>"><i style="color: red;" class="fas fa-trash fa-lg"></i></a>
                | <a href="<?= base_url(); ?>Admin/detail/<?= $k['id_kategori']; ?>"><i class="fas fa-info-circle fa-lg"></i></a>
            </td>
        </tr>
    <?php endforeach ?>

</tbody>