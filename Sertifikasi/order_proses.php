<?php

require_once "koneksi.php";

if (isset($_POST['b_simpan'])) {

    $order_nama = $_POST['order_nama'];
    $order_hp = $_POST['order_hp'];
    $order_tanggal = $_POST['order_tanggal'];// format tanggal dalam format YYYY-MM-DD
    $order_pilih = $_POST['order_pilih'];
    $order_tambahan = implode(',', $_POST['order_tambahan']);
    $order_harga = $_POST['order_harga'];

   // sql untuk input database
   $sql = "INSERT INTO tb_order SET
   order_nama=:order_nama, 
   order_hp=:order_hp,
   order_tanggal=:order_tanggal,
   order_pilih=:order_pilih,
   order_tambahan=:order_tambahan,
   order_harga=:order_harga";

    $stmt = $koneksi->prepare($sql);

    $stmt->bindParam("order_nama", $order_nama);
    $stmt->bindParam("order_hp", $order_hp);
    $stmt->bindParam("order_tanggal", $order_tanggal);
    $stmt->bindParam("order_pilih", $order_pilih);
    $stmt->bindParam("order_tambahan", $order_tambahan);
    $stmt->bindParam("order_harga", $order_harga);

    $stmt->execute();

    header("location:index.php?page=order_tampil");
}