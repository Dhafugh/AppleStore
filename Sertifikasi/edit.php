<?php
require_once "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_order WHERE order_id =?";
    $stmt = $koneksi->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch();

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $hp = $_POST['hp'];
        $tanggal = $_POST['tanggal']; // bagian tgl
        $pilih = $_POST['pilih'];
        $tambahan = implode(',', $_POST['tambahan']);
        $harga = $_POST['harga'];

        $sql = "UPDATE tb_order SET order_nama =?, order_hp =?, order_pilih =?, order_tambahan =?, order_harga =?, order_tanggal =? WHERE order_id =?";
        $stmt = $koneksi->prepare($sql);
        $stmt->execute([$nama, $hp, $pilih, $tambahan, $harga, $tanggal, $id]);

        header('location:index.php?page=order_tampil');
        exit;
    }
}

?>

<form action="" method="post">

    <table>
        <tr>
            <td><label>Nama:</label></td>
            <td><input type="text" name="nama" value="<?php echo $row['order_nama'];?>"></td>
        </tr>
        <tr>
            <td> <label>HP:</label></td>
            <td> <input type="text" name="hp" value="<?php echo $row['order_hp'];?>"></td>
        </tr>
        <tr>
            <td><label>Tanggal:</label></td>
            <td><input type="date" name="tanggal" value="<?php echo $row['order_tanggal'];?>"></td>
        </tr>
        <tr>
            <td><label>Pilih:</label></td>
            <td>
                <select name="pilih" id="pilih" onchange="hitungHarga()">
                    <option value="IPhone 15" <?php if($row['order_pilih'] == 1) echo 'elected';?>>IPhone 15 (Rp 14.000.000)</option>
                    <option value="IPad Pro M4" <?php if($row['order_pilih'] == 2) echo 'elected';?>>IPad Pro M4 (Rp 14.749.000)</option>
                    <option value="MacBook Air M3" <?php if($row['order_pilih'] == 3) echo 'elected';?>>MacBook Air M3 (Rp 19.000.000)</option>
                    <option value="IWatch Ultra 2" <?php if($row['order_pilih'] == 4) echo 'elected';?>>IWatch Ultra 2 (Rp 16.000.000)</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Tambahan:</label></td>
            <td>
                <?php
                $tambahan_array = explode(',', $row['order_tambahan']); // convert string to array
             ?>
                <input type="checkbox" name="tambahan[]" value="PhotoCard" <?php if(in_array('PhotoCard', $tambahan_array)) echo 'checked';?> onchange="hitungHarga()"> PhotoCard (Rp 50.000)<br>
                <input type="checkbox" name="tambahan[]" value="Poster" <?php if(in_array('Poster', $tambahan_array)) echo 'checked';?> onchange="hitungHarga()"> Poster (Rp 75.000)<br>
                <input type="checkbox" name="tambahan[]" value="Sign" <?php if(in_array('Sign', $tambahan_array)) echo 'checked';?> onchange="hitungHarga()"> Sign (Rp 100.000)<br>
            </td>
        </tr>
        <tr>
            <td><label>Harga:</label></td>
            <td><input type="text" name="harga" id="harga" value="<?php echo $row['order_harga'];?>" readonly></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Update"></td>
        </tr>
    </table>

    <script>
        function hitungHarga() {
            var pilih = document.getElementById("pilih").value;
            var tambahan = [];
            var hargaTambahan = 0;

            // Get the checked tambahan checkboxes
            var tambahanCheckboxes = document.getElementsByName("tambahan[]");
            for (var i = 0; i < tambahanCheckboxes.length; i++) {
                 if (tambahanCheckboxes[i].checked) {
                    tambahan.push(tambahanCheckboxes[i].value);
                    switch (tambahanCheckboxes[i].value) {
                        case "PhotoCard":
                            hargaTambahan += 50000;
                            break;
                        case "Poster":
                            hargaTambahan += 75000;
                            break;
                        case "Sign":
                            hargaTambahan += 100000;
                            break;
                    }
                }
            }

            // Calculate the total price
            var hargaTotal = 0;
            switch (pilih) {
                case "IPhone 15":
                    hargaTotal = 14000000;
                    break;
                case "IPad Pro M4":
                    hargaTotal = 14749000;
                    break;
                case "MacBook Air M3":
                    hargaTotal = 19000000;
                    break;
                case "IWatch Ultra 2":
                    hargaTotal = 16000000;
                    break;
            }
            hargaTotal += hargaTambahan;

            // Update the harga field
            document.getElementById("harga").value = hargaTotal;
        }
    </script>
</form>