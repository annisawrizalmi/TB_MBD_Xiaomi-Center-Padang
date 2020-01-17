<?php 

include "koneksi.php";

//cek dulu apakah parameter id ada atau tidak
if(isset($_GET['kode'])){
   $kode = $_GET['kode'];

} else {
    //kalo gak ada  parameternya
    echo "<script>alert('id Barang Belum Dipilih');document.location='barang.php'</script>";
}

//ambil data barang dengan kode yang dipilih dan tampilkan dalam form
   $sql = "SELECT * FROM barang WHERE id_barang='$kode'";
   
   $queri = mysqli_query($conn, $sql);
   $data = mysqli_fetch_array($queri);
   
   //tampung masing-masing data ke dalam variabel

   $idbarang = $data['id_barang'];
   $tipebrg = $data['tipe_barang'];
   $warnabrg = $data['warna'];
   $stockbrg = $data['stock'];
   $ramrombrg = $data['ram_rom'];
   $hargabrg = $data['harga'];
   $imeibrg = $data['imei'];

?>
<!-- sekarang bikin formnya -->

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Barang</title>
  <link href="styleform.css" rel="stylesheet">
	<script language="javascript">
    function cekform(){
    //ini untuk ngecek formnya (semua form tidak boleh kosong)
    if(document.frmbarang.idbarang.value==""){
        alert('ID Barang Harus Diisi');
        document.frmbarang.idbarang.focus();
        return false;
    } else if(document.frmbarang.tpbrg.value==""){
        alert('Tipe Barang Harus Diisi');
        document.frmbarang.tpbrg.focus();
        return false;
    } else if(document.frmbarang.wrn.value==""){
        alert('Warna Barang Harus Diisi');
        document.frmbarang.wrn.focus();
        return false;
    } else if(document.frmbarang.stk.value==""){
        alert('Stock Barang Harus Diisi');
        document.frmbarang.stk.focus();
        return false;
    } else if(document.frmbarang.rr.value==""){
        alert('Ram / Rom Barang Harus Diisi');
        document.frmbarang.rr.focus();
        return false;  
    }  else if(document.frmbarang.hrg.value==""){
        alert('Harga Barang Harus Diisi');
        document.frmbarang.hrg.focus();
        return false;
    }  else if(document.frmbarang.imei.value==""){
        alert('Imei Barang Harus Diisi');
        document.frmbarang.imei.focus();
        return false;
    } else {
        return true;
    }
}
</script>
</head>
<body>

<div>
    <center class="cen">Edit Barang</center> 
  
    <form action="" method="post" name="frmbarang" onsubmit="return cekform()">
        <table>

          <tr>
            <td width="163">Id Barang </td>
            <td width="321">
              <!-- textbox untuk kodebarang dibuat menjadi readonly. Ini karena field kodebarang adalah Primary Key, sehingga tidak boleh diedit-->
              <input name="id" type="text" id="id" size="5" maxlength="5" value="<?php echo $idbarang ?>" readonly /></td>
          </tr>
          <tr>
            <td>Tipe Barang </td>
            <td><input name="tpbrg" type="text" id="tpbrg" value="<?php echo $tipebrg ?>" autocomplete="off" /></td>
          </tr>
          <tr>
            <td>Warna</td>
            <td><input name="wrn" type="text" id="wrn" value="<?php echo $warnabrg ?>" autocomplete="off" /></td>
          </tr>
          <tr>
            <td>Stock</td>
            <td><input name="stk" type="number" id="stk" value="<?php echo $stockbrg ?>" autocomplete="off" /></td>
          </tr>
           <tr>
            <td>Ram / Rom</td>
            <td><input name="rr" type="text" id="rr" value="<?php echo $ramrombrg ?>" autocomplete="off" /></td>
          </tr>
           <tr>
            <td>Harga</td>
            <td><input name="hrg" type="text" id="hrg" value="<?php echo $hargabrg ?>" autocomplete="off" /></td>
          </tr>
           <tr>
            <td>Imei</td>
            <td><input name="imei" type="text" id="imei" value="<?php echo $imeibrg ?>" autocomplete="off" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="mit" type="submit" id="mit" value="Edit Barang" /></td>
        </tr>
</table>
</form>
</div>
	

</body>
</html>

<?php  

if(isset($_POST['mit'])){
    //ini adalah variabel untuk menampung inputan dari form (nama variabel bebas)
    // yang ada di dalam $_POST[''] adalah nama dari masing-masing textbox
   	$id = $_POST['id'];
    $tipe = $_POST['tpbrg'];
    $warna = $_POST['wrn'];
    $stock = $_POST['stk'];
    $ram_rom = $_POST['rr'];
    $harga = $_POST['hrg'];
    $imei = $_POST['imei'];
    //siapkan sebuah variabel untuk menampung query mysql
    //yang ada di dalam VALUES harus berurutan sesuai dengan uturan field yang ada dalam tabel

    $sql = "UPDATE barang SET tipe_barang='$tipe', warna='$warna', stock=$stock, ram_rom='$ram_rom', harga=$harga, imei='$imei' WHERE id_barang='$id'";

    //jalankan kuerynya
    $queri = mysqli_query($conn, $sql);
    //cek apakah variabel $kueri bernilai TRUE atau FALSE
    
    if($queri){
    //ini kalo TRUE
    //tampilin alert pake javascript aja deh
        echo "<script>alert('Data barang berhasil diedit'); document.location='barang.php'</script>";
    } else {
    //ini kalo FALSE
        echo "<script>alert('Data barang gagal diedit')</script>";
        //tampilkan pesan error mysqlnya
        echo mysqli_error();
    }
}



?>