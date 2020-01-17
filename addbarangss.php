<!DOCTYPE html>
<html>
<head>
    <title> Tambah Data Barang</title>
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
      } else if(document.frmbarang.hrg.value==""){
        alert('Harga Barang Harus Diisi');
        document.frmbarang.hrg.focus();
        return false;
      } else if(document.frmbarang.imei.value==""){
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
        <center class="cen">Tambah Barang</center>

         <button><a href="barang.php">View</a></button>

        <form action="" method="post" name="frmbarang" onsubmit="return cekform()">
        <table>

          <tr>
            <td width="163">Id Barang </td>
            <td width="321"><input name="id" type="text" id="id" size="5" maxlength="5" autocomplete="off" /></td>
          </tr>
          <tr>
            <td>Tipe Barang </td>
            <td><input name="tpbrg" type="text" id="tpbrg" autocomplete="off" /></td>
          </tr>
          <tr>
            <td>Warna</td>
            <td><input name="wrn" type="text" id="wrn" autocomplete="off" /></td>
          </tr>
          <tr>
            <td>Stock</td>
            <td><input name="stk" type="number" id="stk" autocomplete="off" /></td>
          </tr>
           <tr>
            <td>Ram / Rom</td>
            <td><input name="rr" type="text" id="rr" autocomplete="off" /></td>
          </tr>
           <tr>
            <td>Harga</td>
            <td><input name="hrg" type="text" id="hrg" autocomplete="off" /></td>
          </tr>
           <tr>
            <td>Imei</td>
            <td><input name="imei" type="text" id="imei" autocomplete="off" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="mit" type="submit" id="mit" value="Tambah Barang" /></td>
        </tr>
</table>
    </div>
    
</form>
</body>
</html>

<?php
//include file koneksi ke mysql
include "koneksi.php";
//ini kalo tombol submitnya diklik
//perhatikan nama dari tombol tsb (tblIsi)

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
    $sql = "INSERT INTO barang VALUES('$id','$tipe','$warna', $stock, '$ram_rom', $harga, '$imei')";

    //jalankan kuerynya
    $queri = mysqli_query($conn, $sql);

    //cek apakah variabel $kueri bernilai TRUE atau FALSE
    if($queri){
    //ini kalo TRUE
    //tampilin alert pake javascript aja deh
        echo "<script>alert('Data barang berhasil dimasukkan ke database')</script>";
    } else {
    //ini kalo FALSE
        echo "<script>alert('Data barang gagal dimasukkan ke database')</script>";
        //tampilkan pesan error mysqlnya
        echo mysqli_error();
    }
}
?>