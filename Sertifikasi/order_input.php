<h2 >Input Data Order</h2>
<form action="order_proses.php" method="post" >

<table class="masukkan">
    <tr>
        <td>Nama</td>
        <td><input type="text" name="order_nama" id="nama" onblur="cek_valid2()">
        <label id="namaError" style="color:red"></label></td>
    </tr>
    <tr>
        <td>HP</td>
        <td><input type="text" name="order_hp" id="hp" onblur="cek_valid2()">
        <label id="hpError" style="color:red"></label></td>
        
    </tr>
    <tr>
        <td>Tanggal</td>
        <td><input type="date" name="order_tanggal" required></td>
    </tr>
    <tr>
        <td>Pilih</td>
        <td>
            <select name="order_pilih" id="pilih" onchange="hitungHarga()">
                <option value="">--PILIH--</option>
                <option value="IPhone 15">IPhone 15 (Rp 14.000.000)</option>
                <option value="IPad Pro M4">IPad Pro M4 (Rp 14.749.000)</option>
                <option value="MacBook Air M3">MacBook Air M3 (Rp 19.000.000)</option>
                <option value="IWatch Ultra">IWatch Ultra (Rp 16.000.000)</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Tambahan</td>
        <td>
            <input type="checkbox" name="order_tambahan[]" value="Paper Bag" onchange="hitungHarga()"> Paper Bag (Rp 50.000)<br>
            <input type="checkbox" name="order_tambahan[]" value="Carger" onchange="hitungHarga()"> Carger (Rp 200.000)<br>
            <input type="checkbox" name="order_tambahan[]" value="Case" onchange="hitungHarga()"> Case (Rp 500.000)<br>
        </td>
    </tr>
    <tr>
        <td>Harga</td>
        <td><input type="text" name="order_harga" id="harga" readonly></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="b_simpan" value="simpan"></td>
    </tr>
</table>

<script>
     function hitungHarga() {
            var pilih = document.getElementById("pilih").value;
            var tambahan = [];
            var hargaTambahan = 0;

            // Get the checked tambahan checkboxes
            var tambahanCheckboxes = document.getElementsByName("order_tambahan[]");
            for (var i = 0; i < tambahanCheckboxes.length; i++) {
                 if (tambahanCheckboxes[i].checked) {
                    tambahan.push(tambahanCheckboxes[i].value);
                    switch (tambahanCheckboxes[i].value) {
                        case "Paper Bag":
                            hargaTambahan += 50000;
                            break;
                        case "Carger":
                            hargaTambahan += 200000;
                            break;
                        case "Case":
                            hargaTambahan += 500000;
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
                case "IWatch Ultra":
                    hargaTotal = 16000000;
                    break;
            }
            hargaTotal += hargaTambahan;

            // Update the harga field
            document.getElementById("harga").value = hargaTotal;
        }

        function cek_valid() {                    
            var nama = document.getElementById("nama").value;
            var hp = document.getElementById("hp").value;
            var pilih = document.getElementById("pilih").value;
            var validasiHuruf = /^[a-zA-Z ]+$/;
            var validasiAngka = /^[0-9]+$/;  
            var pesan = '';           

            if (nama == ""){
                pesan += 'Nama Harus Diisi\n';            
            }                     
                    
            if (nama != "" && !nama.match(validasiHuruf)) {
                pesan += 'Nama Harus Huruf\n';
            } 

            if (hp == ""){
                pesan = 'HP Harus Diisi\n';            
            }                     
                    
            if (hp != "" && !hp.match(validasiAngka)) {
                pesan += 'HP Harus Angka\n';
            }   

            if(pesan != ""){//kondisi untuk menampilkan pesan
                alert('Ada kesalahan pada pengisisan formulir : \n'+pesan);
                return false;
            }
            
            if(nama != "" && hp != ""  && paket != "" ){
                alert(data);
            }
            return true;
        }

        function cek_valid2() {
            var nama = document.getElementById("nama").value;
            var hp = document.getElementById("hp").value;
            var pilih = document.getElementById("pilih").value;
            //var data = "NIM Anda = " + nim + "<br>Nama Anda = " + nama + "<br>Kelas Anda = " + kelas;
            var validasiHuruf = /^[a-zA-Z ]+$/; 
            var validasiAngka = /^[0-9]+$/;           
                        
            if (nama == ""){
                document.getElementById("namaError").innerHTML = "Nama Masih Kosong";                                  
            } else {
                if (nama.match(validasiHuruf)) {
                    document.getElementById("namaError").innerHTML = "";                        
                } else {
                    document.getElementById("namaError").innerHTML = "Nama Harus Huruf";
                }  
            }  

            if (hp == ""){
                document.getElementById("hpError").innerHTML = "hp Masih Kosong";                    
            } else {
                if (hp.match(validasiAngka)) {
                    document.getElementById("hpError").innerHTML = "";
                } else {
                    document.getElementById("hpError").innerHTML = "hp Harus Angka";
                }                   
            }
        }
</script>
</form>