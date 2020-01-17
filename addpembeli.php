autocomplete="off"<!DOCTYPE html>
<html>
<head>
	<title> Tambah Data Pembeli</title>
    <link href="styleform.css" rel="stylesheet">
	<script language="javascript">
    function cekform(){
    //ini untuk ngecek formnya (semua form tidak boleh kosong)
    if(document.frmpembeli.idpembeli.value==""){
        alert('ID Pembeli Harus Diisi');
        document.frmpembeli.idpembeli.focus();
        return false;
    } else if(document.frmpembeli.namapembeli.value==""){
        alert('Nama Pembeli Harus Diisi');
        document.frmpembeli.namapembeli.focus();
        return false;
    } else if(document.frmpembeli.notelpn.value==""){
        alert('No Telepon Harus Diisi');
        document.frmpembeli.notelpon.focus();
        return false;
    } else {
        return true;
    }
}
</script>
</head>
<body>

<div>
    <center class="cen">Tambah pembeli</center>

    <button><a href="pembeli.php">View</a></button>

    <form action="" method="post" name="frmpembeli" onsubmit="return cekform()">
        <table>
          <tr>
            <td width="163"> Id Pembeli </td>
            <td width="321"><input name="idpem" type="text" id="idpem" size="5" maxlength="5" autocomplete="off" /></td>
          </tr>
          <tr>
            <td>Nama Pembeli </td>
            <td><input name="nampem" type="text" id="nampem" autocomplete="off" /></td>
          </tr>
          <tr>
            <td>No telpon</td>
            <td><input name="nopon" type="text" id="nopon" autocomplete="off" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="mitt" type="submit" id="mitt" value="Tambah Pembeli" /></td>
        </tr>
</table>
</form>
</div>
		
</body>
</html>

<?php
//include file koneksi ke mysql
include "koneksi.php";
//ini kalo tombol submitnya diklik
//perhatikan nama dari tombol tsb (tblIsi)

if(isset($_POST['mitt'])){
    //ini adalah variabel untuk menampung inputan dari form (nama variabel bebas)
    // yang ada di dalam $_POST[''] adalah nama dari masing-masing textbox
    $idpe = $_POST['idpem'];
    $nape = $_POST['nampem'];
    $note = $_POST['nopon'];

    //siapkan sebuah variabel untuk menampung query mysql
    //yang ada di dalam VALUES harus berurutan sesuai dengan uturan field yang ada dalam tabel
    $sql = "INSERT INTO pembeli VALUES('$idpe','$nape','$note')";

    //jalankan kuerynya
    $queri = mysqli_query($conn, $sql);

    //cek apakah variabel $kueri bernilai TRUE atau FALSE
    if($queri){
    //ini kalo TRUE
    //tampilin alert pake javascript aja deh
        echo "<script>alert('Data Pembeli berhasil dimasukkan ke database')</script>";
    } else {
    //ini kalo FALSE
        echo "<script>alert('Data Pembeli gagal dimasukkan ke database')</script>";
        //tampilkan pesan error mysqlnya
        echo mysqli_error();
    }
}
?>