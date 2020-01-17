 <?php
//cek dulu apakah parameter kode ada atau tidak
if(isset($_GET['kode']))
{
   include "koneksi.php";
   //kalo ada berarti lakukan perintah delete
   $kode = $_GET['kode'];
   $sql = "DELETE FROM barang WHERE id_barang='$kode'";
   $kueri = mysqli_query($conn, $sql);
   if($kueri){
       //kalo deletenya berhasil
    //tampilkan alert dan pindah ke halaman daftar barang
    echo "<script>alert('id barang berhasil dihapus');document.location='barang.php'</script>";
   } else{
   echo "<script>alert('Data barang Gagal dihapus');document.location='barang.php'</script>";
   }
} else {
    //kalo gak ada  parameternya
    echo "<script>alert('Id Barang Belum Dipilih');document.location='barang.php'</script>";
}
?>
