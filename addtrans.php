<?php
//include file koneksi ke mysql
include "koneksi.php";
//ini kalo tombol submitnya diklik
//perhatikan nama dari tombol tsb (tblIsi)

if(isset($_POST['mit'])){
    //ini adalah variabel untuk menampung inputan dari form (nama variabel bebas)
    // yang ada di dalam $_POST[''] adalah nama dari masing-masing textbox
    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $no = $_POST['juba'];
    $brg= $_POST['barang'];

    //siapkan sebuah variabel untuk menampung query mysql
    //yang ada di dalam VALUES harus berurutan sesuai dengan uturan field yang ada dalam tabel
    $sql = "INSERT INTO transaksi(tgl_transaksi, total_harga, id_pembeli, kode_user, status) VALUES(CURDATE(),'$no', '$id', '$kode', '$no')";
    //jalankan kuerynya
    $queri = mysqli_query($conn, $sql);
    
     $last_id = mysqli_insert_id($conn);
     $a= "INSERT INTO detail_transaksi(no_faktur,id_barang,jumlah_barang) VALUES ('$last_id','$brg','$no')";

     $queri2 = mysqli_query($conn, $a);

    //cek apakah variabel $kueri bernilai TRUE atau FALSE




    if($queri){
    //ini kalo TRUE
    //tampilin alert pake javascript aja deh
        echo "<script>alert('Data transaksi berhasil dimasukkan ke database')</script>";
    } else {
    //ini kalo FALSE
        echo "<script>alert('Data transaksi gagal dimasukkan ke database')</script>";
       
         //echo mysqli_error($sql);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title> Tambah Data Barang</title>
    <link href="styleform.css" rel="stylesheet">
    <script language="javascript">
    function cekform(){
    //ini untuk ngecek formnya (semua form tidak boleh kosong)
    if(document.frmbarang.nofaktur.value==""){
        alert('No Faktur Harus Diisi');
        document.frmbarang.idbarang.focus();
        return false;
    } else if(document.frmbarang.tpbrg.value==""){
        alert('nama pembeli Harus Diisi');
        document.frmbarang.tpbrg.focus();
        return false;
    } else if(document.frmbarang.wrn.value==""){
        alert('Jumlah Barang Harus Diisi');
        document.frmbarang.wrn.focus();
        return false;
    }  else {
        return true;
    }
}
</script>
</head>
<body>

<div>
    <center class="cen">Tambah Transaksi</center>

     <button><a href="transaksi.php">View</a></button>
    <form action="" method="post" name="frmbarang" onsubmit="return cekform()">
        <table>
          <tr>
            <td width="163">Pembeli</td>
            <td width="321">
                <select name="id" class="sel">
                    <?php
                        $q = "SELECT id_pembeli, nama_pembeli FROM pembeli";
                        $r = mysqli_query($conn, $q);
                        while($d = mysqli_fetch_object($r)){ ?>
                            <option value="<?= $d->id_pembeli; ?>"><?= $d->nama_pembeli;?></option>
                            <?php
                        }
                    ?>
                </select>
            </td>
          </tr>
          <tr>
            <td width="163">User</td>
            <td width="321">
                <select name="kode" class="sel">
                    <?php
                        $q = "SELECT kode_user, nama FROM login";
                        $r = mysqli_query($conn, $q);
                        while($d = mysqli_fetch_object($r)){ ?>
                            <option value="<?= $d->kode_user; ?>"><?= $d->nama;?></option>
                            <?php
                        }
                    ?>
                </select>
            </td>
          </tr>
          <tr>
            <td width="163">Nama barang</td>
            <td width="321">
                <select name="barang" class="sel">
                    <?php
                        $q = "SELECT id_barang, tipe_barang FROM barang";
                        $r = mysqli_query($conn, $q);
                        while($d = mysqli_fetch_object($r)){ ?>
                            <option value="<?= $d->id_barang; ?>"><?= $d->tipe_barang;?></option>
                            <?php
                        }
                    ?>
                </select>
            </td>
          </tr>
          <tr>
              <td>Jumlah Barang</td>
            <td><input name="juba" type="text" id="juba"  autocomplete="off" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="mit" type="submit" id="mit" value="Tambah Transaksi" /></td>
        </tr>
</table>
</form>
</div>
    
</body>
</html>
