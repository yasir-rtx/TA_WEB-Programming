<?php include "connection.php"; ?>
<a href="?p=ruleadd">ADD</a>
<table>
    <tr>
        <th>NO</th>
        <th>KODE</th>
        <th>RULE</th>
        <th>KODE PENYAKIT</th>
        <th>PENYAKIT</th>
        <th>PASIEN</th>
        <th>ACTION</th>
    </tr>

    <?php 
        $sql_rule = mysqli_query($conn, "SELECT * FROM rule");
        $no=1;
    ?>
    
    <?php while ($rr = mysqli_fetch_array($sql_rule)) : ?>
        <?php 
            $sql_penyakit = mysqli_query($conn, "SELECT * FROM penyakit WHERE id_penyakit=$rr[id_penyakit]");
            $rp = mysqli_fetch_array($sql_penyakit);
        ?>
        <tr>
            <td><?php echo "$no"; ?></td>
            <td><?php echo "$rr[kode_rule]"; ?></td>
            <td><?php echo "$rr[rule]"; ?></td>
            <td><?php echo "$rp[kode_penyakit]"; ?></td>
            <td><?php echo "$rp[penyakit]"; ?></td>
            <td><?php echo "$rr[pasien]"; ?></td>
            <td>
                <a href="?p=ruleedit&idr=<?php echo "$rr[id_rule]"; ?>">EDIT</a>
                <a href="?p=ruledeleteidr=<?php echo "$rr[id_rule]"; ?>" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS DATA?');">DELETE</a>
            </td>
        </tr>
    <?php $no++; ?>
    <?php endwhile; ?>
</table>