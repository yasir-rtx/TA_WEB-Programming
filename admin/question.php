<?php include "connection.php"; ?>

    <a href="?p=questionadd">
        <div class="btn btn-add">
            <p>TAMBAH DATA PERTANYAAN</p>
        </div>
    </a>

<table>
    <tr>
        <th>NO</th>
        <th>KODE</th>
        <th>PERTANYAAN</th>
        <th>ACTION</th>
    </tr>

    <?php 
        $sql_question = mysqli_query($conn, "SELECT * FROM questions");
        $no=1;
    ?>
    
    <?php while ($rq = mysqli_fetch_array($sql_question)) : ?>
        <tr>
            <td><?php echo "$no"; ?></td>
            <td><?php echo "$rq[kode_quest]"; ?></td>
            <td><?php echo "$rq[question]"; ?></td>
            <td>
                <a href="?p=questionedit&idq=<?php echo "$rq[id_quest]"; ?>">EDIT</a>
                <a href="?p=questiondelete&idq=<?php echo "$rq[id_quest]"; ?>" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS DATA?');">DELETE</a>
            </td>
        </tr>
    <?php $no++; ?>
    <?php endwhile; ?>
</table>