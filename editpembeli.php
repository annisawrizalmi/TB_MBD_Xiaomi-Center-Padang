autocomplete="off"<?php 

include "koneksi.php";

//cek dulu apakah parameter id ada atau tidak
if(isset($_GET['id'])){
   $id = $_GET['id'];

} else {
    //kalo gak ada  parameternya
    echo "<script>alert('id Pembeli Belum Dipilih');document.location='barang.php'</script>";
}

//ambil data barang dengan kode yang dipilih dan tampilkan dalam form
   $sql = "SELECT * FROM pembeli WHERE id_pembeli='$id'";
   
   $queri = mysqli_query($conn, $sql);
   $data = mysqli_fetch_array($queri);
   
   //tampung masing-masing data ke dalam variabel

   $idpembeli = $data['id_pembeli'];
   $namapembeli = $data['nama_pembeli'];
   $notelepon = $data['no_hp'];
  
?>
<!-- sekarang bikin formnya -->

<!DOCTYPE html>
<html>
<head>
	<title> Edit Pembeli</title>
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
      <center class="cen"> Edit pembeli</center>
      <form action="" method="post" name="frmpembeli" onsubmit="return cekform()">
          <table>
            <tr>
              <td width="163"> Id Pembeli </td>
              <td width="321">
                <input name="idpem" type="text" id="idpem" size="5" maxlength="5" value="<?php echo $idpembeli ?>" readonly /></td>
            </tr>
            <tr>
              <td>Nama Pembeli </td>
              <td><input name="nampem" type="text" id="nampem" value="<?php echo $namapembeli ?>"  autocomplete="off"/></td>
            </tr>
            <tr>
              <td>No telpon</td>
              <td><input name="nopon" type="text" id="nopon" value="<?php echo $notelepon ?>" autocomplete="off" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input name="mitt" type="submit" id="mitt" value="Edit Pembeli" autocomplete="off" /></td>
          </tr>
      </table>
    </form>
  </div>


</body>
</html>

<?php  

if(isset($_POST['mitt'])){
    //ini adalah variabel untuk menampung inputan dari form (nama variabel bebas)
    // yang ada di dalam $_POST[''] adalah nama dari masing-masing textbox
  	$idpe = $_POST['idpem'];
    $nape = $_POST['nampem'];
    $note = $_POST['nopon'];
    //siapkan sebuah variabel untuk menampung query mysql
    //yang ada di dalam VALUES harus berurutan sesuai dengan uturan field yang ada dalam tabel

    $sql = "UPDATE pembeli SET nama_pembeli='$nape', no_hp='$note' WHERE id_pembeli='$id'";

    //jalankan kuerynya
    $queri = mysqli_query($conn, $sql);
    //cek apakah variabel $kueri bernilai TRUE atau FALSE
    
    if($queri){
    //ini kalo TRUE
    //tampilin alert pake javascript aja deh
        echo "<script>alert('Data pembeli berhasil diedit'); document.location='pembeli.php'</script>";
    } else {
    //ini kalo FALSE
        echo "<script>alert('Data pembeli gagal diedit')</script>";
        //tampilkan pesan error mysqlnya
        echo mysqli_error();
    }
}



?>