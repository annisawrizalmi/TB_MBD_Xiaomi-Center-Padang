<!DOCTYPE html>
<html>
<head>
    <title> Halaman Detail Transaksi</title>
    <link href="styledet.css" rel="stylesheet">
</head>
<body>
     <div class="content">
        <h3><center>Detail Transaksi</center></h3>
        <table class="table-form">
                    <?php 
                include 'koneksi.php';

                $ID = $_GET['id'];
                $sql = " SELECT * FROM detail_transaksi JOIN barang ON detail_transaksi.id_barang = barang.id_barang
                JOIN transaksi ON detail_transaksi.no_faktur = transaksi.no_faktur
                 JOIN pembeli ON transaksi.id_pembeli = pembeli.id_pembeli WHERE 
                 detail_transaksi.no_faktur = '$ID'";
               
                
                $query = mysqli_query($conn, $sql) ;

               while ($data = mysqli_fetch_array($query)) {
                                ?>
                    <tr>
                        <td width="20%">No Faktur</td>
                        <td width="1%">:</td>
                          <td><?php echo $data['no_faktur']; ?></td>
                    </tr>
                    <tr>
                         <td>Id barang</td>
                        <td width="1%">:</td>
                        <td><?php echo $data['id_barang']; ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Barang</td>
                        <td width="10%">:</td>
                        <td><?php echo $data['jumlah_barang']; ?></td>
                    </tr>
                    <tr>
                         <td>Nama Pembeli</td>
                        <td width="1%">:</td>
                        <td><?php echo $data['nama_pembeli']; ?></td>
                    </tr>
                    <tr>
                        <td>harga</td>
                        <td width="1%">:</td>
                         <td><?php echo $data['harga']; ?></td>
                    </tr>
            <?php 

        }
        ?>

        </table>
    <button class="button"><a href="transaksi.php" class="btn">Kembali</a></button>

    </div>

</body>
</html>
