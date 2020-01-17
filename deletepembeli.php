<?php
//cek dulu apakah parameter kode ada atau tidak
if(isset($_GET['id']))
{
   include "koneksi.php";
   //kalo ada berarti lakukan perintah delete
   $id = $_GET['id'];
   $sql = "DELETE FROM pembeli WHERE id_pembeli='$id'";
   $kueri = mysqli_query($conn, $sql);
   if($kueri){
       //kalo deletenya berhasil
    //tampilkan alert dan pindah ke halaman daftar barang
    echo "<script>alert('id pembeli berhasil dihapus');document.location='pembeli.php'</script>";
   } else{
   echo "<script>alert('Data pembeli Gagal dihapus');document.location='pembeli.php'</script>";
   }
} else {
    //kalo gak ada  parameternya
    echo "<script>alert('Id pembeli Belum Dipilih');document.location='pembeli.php'</script>";
}
?>
