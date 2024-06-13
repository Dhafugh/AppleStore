<h2>Tampil Data Order</h2>

    <?php 
    require_once "koneksi.php";
    $sql = "SELECT * FROM tb_order";
    $stmt = $koneksi->prepare($sql);
    $stmt->execute();

    $rows = $stmt->fetchALL();
    ?>

    <table class="tampil">
        <tr>
            <td>NO</td>
            <td>Nama</td>
            <td>HP</td>
            <td>Tanggal</td>
            <td>Pilih</td>
            <td>Tambahan</td>
            <td>Harga</td>
            <td></td>
            <td></td>
        </tr>
        <?php foreach ($rows as $r ){?>
            <tr>
                <td><?php echo $r['order_id'];?></td>
                <td><?php echo $r['order_nama'];?></td>
                <td><?php echo $r['order_hp'];?></td>
                <td><?php echo $r['order_tanggal'];?></td>
                <td><?php echo $r['order_pilih'];?></td>
                <td><?php echo $r['order_tambahan'];?></td>
                <td><?php echo $r['order_harga'];?></td>
                <td>
                    <a href="index.php?page=edit&id=<?php echo $r['order_id'];?>">Edit</a>
                </td>
                <td>
                    <a href="index.php?page=delete&id=<?php echo $r['order_id'];?>" onclick="return confirm('Are you sure you want to delete this order?')">Delete</a>
                </td>
            </tr>
        <?php }?>
</table>