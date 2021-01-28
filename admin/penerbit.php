<a href="<?php echo "?p=penerbitadd"; ?>"><button>Tambah</button></a>
<br>
<table class="list">
    <tr>
        <th>NO</th>
        <th>ID</th>
        <th>Penerbit</th>
        <th>Alamat</th>
        <th>Logo</th>
        <th>Aksi</th>
    </tr>

    <?php $sqlpenerbit = mysqli_query($conn, "SELECT * FROM penerbit"); ?>
    <?php $no=1; ?>
    <?php while ($rp = mysqli_fetch_array($sqlpenerbit)) : ?>
        <tr>
            <td><?php echo "$no"; ?></td>
            <td><?php echo "$rp[id_penerbit]"; ?></td>
            <td><?php echo "$rp[nama]"; ?></td>
            <td><?php echo "$rp[alamat]"; ?></td>
            <td><?php echo "$rp[logo]"; ?></td>
            <td>
                <a href="<?php echo "?p=penerbitedit&idp=$rp[id_penerbit]"; ?>"><button class="btn-on">EDIT</button></a>
                <a href="<?php echo "?p=penerbitdelete&idp=$rp[id_penerbit]"; ?>"><button class="btn-on">DELETE</button></a>
            </td>
        </tr>
        <?php $no++; ?>
    <?php endwhile; ?>
</table>