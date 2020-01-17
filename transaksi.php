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
     <h2 id="jud"> <center> Daftar Transaksi  <center></h2>

       <button class="button but3"><a href='addtrans.php'>Tambah Transaksi</a></button><br><br>
       <div class="table">
         <table>
        <tr>
          <th>No Faktur </th>
          <th>Tanggal Transaksi </th>
          <th>Total Harga </th>
          <th>Id Pembeli </th>
          <th>Detail Transaksi</th>

        </tr>

        <?php 

          include 'koneksi.php';

          $query = " SELECT * FROM transaksi INNER JOIN pembeli ON transaksi.id_pembeli = pembeli.id_pembeli";
          $sql_trans = mysqli_query($conn, $query) or die (mysqli_eror($conn));
          while ($data = mysqli_fetch_array($sql_trans))
          {    ?>

            <tr>
              <td><?=$data['no_faktur']?></td>
              <td><?=$data['tgl_transaksi'] ?></td>
              <td><?=$data['total_harga']?></td>
              <td><?=$data['id_pembeli']?></td>
               <td><a href="detail.php?id=<?php echo $data['no_faktur']?>">Lihat</a></td>
            </tr>

          <?php
          }
        ?>

      </table>

       </div>
      
  </div>

  <div class="footer">copyright &copy;2019 - Annisa Wistia Rizalmi</div>

</div>

<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    $(function(){
 
    });
</script>

</body>
</html>