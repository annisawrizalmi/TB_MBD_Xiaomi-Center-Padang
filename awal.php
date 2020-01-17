<!DOCTYPE html>
<html>
<head>
    <title>Halaman Beranda</title>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link href="Boos/css/bootstrap.min.css" rel="stylesheet">
      <link href="styleal.css" rel="stylesheet">
  <style type="text/css">
  </style>
</head>
<body>
<!-- cek apakah sudah login -->
  <?php 
  session_start();
  if($_SESSION['status']!="login"){
    header("location:logins.php?pesan=belum_login");
  }
  ?>
<div id="canvas">
  <div>
     <div id="header">XIAOMI CENTER Padang</div>

    <div id="menu">
        <ul>
          <li class="utama"><a href="awal.php">HOME</a></li>
          <li class="utama"><a href="#">Barang</a>
              <ul>
                <li><a href="barang.php">Daftar Barang</a></li>
              </ul>
          </li>
          <li class="utama"><a href="#">Pembeli</a>
              <ul>
                <li><a href="pembeli.php">Daftar Pembeli</a></li>
              </ul> 
            </li>
            <li class="utama"><a href="#">Transaksi</a>
               <ul>
                <li><a href="transaksi.php">Data Transaksi</a></li>
            </li>
                </ul>
                  <li class="utama" style="float:right;"><a href="logins.php">Logout</a></li>
      </div>
      <div id="isi">
        <h2 style="margin:50px; ">Selamat Datang : <span><?php echo $_SESSION["username"]?></span></h2>
        
      </div>
    <div class="footer">
      copyright  &copy;2019 - Annisa Wistia Rizalmi
  </div>
</div> 

</body>
</html>