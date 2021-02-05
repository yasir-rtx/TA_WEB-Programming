<?php include "connection.php"; ?>

    <a href="?p=penyakitadd">
        <div class="btn btn-add">
            <p>TAMBAH DATA PENYAKIT</p>
        </div>
    </a>
    
<table>
    <tr>
        <th>NO</th>
        <th>KODE</th>
        <th>PENYAKIT</th>
        <th>PASIEN</th>
        <th>ACTION</th>
    </tr>

    <?php 
        $sql_penyakit = mysqli_query($conn, "SELECT * FROM penyakit");
        $no=1;
    ?>
    
    <?php while ($rp = mysqli_fetch_array($sql_penyakit)) : ?>
        <tr>
            <td><?php echo "$no"; ?></td>
            <td><?php echo "$rp[kode_penyakit]"; ?></td>
            <td><?php echo "$rp[penyakit]"; ?></td>
            <td><?php echo "$rp[pasien]"; ?></td>
            <td>
                <a href="?p=penyakitedit&idp=<?php echo "$rp[id_penyakit]"; ?>">EDIT</a>
                <a href="?p=penyakitdelete&idp=<?php echo "$rp[id_penyakit]"; ?>" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS DATA?');">DELETE</a>
            </td>
        </tr>
    <?php $no++; ?>
    <?php endwhile; ?>
</table>