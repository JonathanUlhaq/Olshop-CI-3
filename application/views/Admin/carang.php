<tbody id="result">
    <?php foreach ($kategori as $b) : ?>
        <tr>
            <td><?= $b['id_user']; ?></td>
            <td><?= $b['username']; ?></td>
            <td><?= $b['nama']; ?></td>

        </tr>
    <?php endforeach ?>

</tbody>