<a href="<?php echo "?p=bukuadd"; ?>"><button>Tambah</button></a>
<br>
<table class="list">
    <tr>
        <th>NO</th>
        <th>ID Buku</th>
        <th>ISBN</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Tahun Terbit</th>
        <th>Tersedia</th>
        <th>Aksi</th>
    </tr>

    <?php $sqlbuku = mysqli_query($conn, "SELECT * FROM buku"); ?>
    <?php $no=1; ?>
    <?php while ($rb = mysqli_fetch_array($sqlbuku)) : ?>
        <tr>
            <td><?php echo "$no"; ?></td>
            <td><?php echo "$rb[id_buku]"; ?></td>
            <td><?php echo "$rb[isbn]"; ?></td>
            <td><?php echo "$rb[judul]"; ?></td>
            <td><?php echo "$rb[pengarang]"; ?></td>
            <td><?php echo "$rb[penerbit]"; ?></td>
            <td><?php echo "$rb[tahun]"; ?></td>
            <td><?php echo "$rb[stok]"; ?></td>
            <td>
                <a href="<?php echo "?p=bukuedit&idb=$rb[id_buku]"; ?>"><button class="btn-on">EDIT</button></a>
                <a href="<?php echo "?p=bukudelete&idb=$rb[id_buku]"; ?>"><button class="btn-on">DELETE</button></a>
            </td>
        </tr>
        <?php $no++; ?>
    <?php endwhile; ?>
</table>