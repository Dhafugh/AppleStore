<?php
require_once "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tb_order WHERE order_id =?";
    $stmt = $koneksi->prepare($sql);
    $stmt->execute([$id]);

    header('location:index.php?page=order_tampil');
    exit;
}
?>