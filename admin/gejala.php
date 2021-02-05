<?php include "connection.php"; ?>

    <a href="?p=gejalaadd">
        <div class="btn btn-add">
            <p>TAMBAH DATA GEJALA</p>
        </div>
    </a>

<table>
    <tr>
        <th>NO</th>
        <th>KODE</th>
        <th>GEJALA</th>
        <th>ACTION</th>
    </tr>

    <?php 
        $sql_gejala = mysqli_query($conn, "SELECT * FROM gejala");
        $no=1;
    ?>
    
    <?php while ($rg = mysqli_fetch_array($sql_gejala)) : ?>
        <tr>
            <td><?php echo "$no"; ?></td>
            <td><?php echo "$rg[kode_gejala]"; ?></td>
            <td><?php echo "$rg[gejala]"; ?></td>
            <td>
                <a href="?p=gejalaedit&idg=<?php echo "$rg[id_gejala]"; ?>">EDIT</a>
                <a href="?p=gejaladelete&idg=<?php echo "$rg[id_gejala]"; ?>" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS DATA?');">DELETE</a>
            </td>
        </tr>
    <?php $no++; ?>
    <?php endwhile; ?>
</table>