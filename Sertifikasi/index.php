<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Website Kami</title>

        <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">

    <header>
        <img src="Image/header3.jpg" alt="">
        </header>
        <nav>
            <ul>
                <li><a href="Index.php">Home</a></li>
                <li><a href="Index.php?page=order_input">Pemesanan</a></li>
                <li><a href="Index.php?page=order_tampil">Daftar Pesanan</a></li>
                <li><a href="Index.php?page=kontak">Kontak</a></li>
                <li><a href="Index.php?page=About">About</a></li>
            </ul>
        </nav>
        <main>
                <?php
                if (isset($_GET['page'])) {
                    require $_GET['page'].".php";
                } else {
                    require "main.php";
                }
                    ?>
        </main>
        <footer>
                <p></p>
                <center>Copyright &copy; 2024. Dhafugh_</center>
        </footer>
    




    </div>
</body>
</html>