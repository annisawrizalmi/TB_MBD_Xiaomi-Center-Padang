<!DOCTYPE html>
<html>
<head>
    <title>Halaman Data Barang</title>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link href="Boos/css/bootstrap.min.css" rel="stylesheet">
      <link href="styleal.css" rel="stylesheet">
      <link href="styletab.css" rel="stylesheet">
  <style type="text/css">
  </style>
</head>
<body>

<div id="canvas">
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
      <div id="content">
      
        <h2 id="jud"><center>Daftar Barang</center></h2>

        <button class="button but1"><a href="addbarangss.php">Tambah Barang</a></button><br><br>   
        <table>
          <tr>
            <th>No</th>
            <th>Id Barang </th>
            <th>Tipe Barang </th>
            <th>Warna </th>
            <th>Stock</th>
            <th>Ram / Rom</th>
            <th>Harga</th>
            <th>Imei</th>
            <th>Action Edit</th>
            <th>Action Delete</th>
          </tr>

          <?php 

           include "koneksi.php";

           $sql = "SELECT * FROM barang";
           $query = mysqli_query($conn, $sql);

           $no = 1;

          while ($data = mysqli_fetch_array($query)) {
          ?>
              <tr>
                <td><?php echo $no?></td>
                <td><?php echo $data['id_barang']?></td>
                <td><?php echo $data['tipe_barang']?></td>
                <td><?php echo $data['warna']?></td>
                <td><?php echo $data['stock']?></td>
                <td><?php echo $data['ram_rom']?></td>
                <td><?php echo $data['harga']?></td>
                <td><?php echo $data['imei']?></td>
                <td><a href="editbarangs.php?kode=<?php echo $data['id_barang']?>">Edit</a></td>
                <td><a href="deletebarang.php?kode=<?php echo $data['id_barang']?>">Delete</a></td>
              </tr>
            <?php 
            $no++; }
            ?>
         </table> 
      </div>
  </div>

  <div class="footer">copyright &copy;2019 - Annisa Wistia Rizalmi</div>

</div>

</body>
</html>