<!DOCTYPE html>
<html lang="en">
<head>
	<title>Halaman Login</title>
	  <meta charset="utf-8">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    	<link href="Boos/css/bootstrap.min.css" rel="stylesheet">
    	<link href="stylelog.css" rel="stylesheet">
</head>
<body>

    <!-- cek pesan notifikasi -->
    <?php 
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
            echo "<script>alert('Login Anda Gagal !! username dan password salah !!')</script>";
        }else if($_GET['pesan'] == "logout"){
            echo  "<script>alert('Anda telah berhasil logout')</script>";
        }else if($_GET['pesan'] == "belum_login"){
            echo "<script>alert('Anda harus login untuk mengakses halaman admin')</script>";
        }
    }
    ?>
    			<div class="col-md-4 col-md-offset-4 form-login">
					<div class="outter-form-login">
	        			<div class="logo-login">
            				<em class="glyphicon glyphicon-user"></em>
        				</div>
        				<div class="alert alert-info">
    						<strong>Login Anda Disini </strong> isi ini dengan user dan password anda.
  						</div>
        					<form action="ceklog.php" class="inner-login" method="post">
                					<div class="form-group form-group-lg">
                    					<input type="text" class="form-control" name="username" placeholder="Username .." autocomplete="off">
                					</div>
                					<div class="form-group form-group-lg">
                    					<input type="password" class="form-control" name="password" placeholder="Password .." autocomplete="off">
                					</div>
                						<input type="submit" class="btn btn-block btn-custom-green btn-lg" value="LOGIN" />
            				</form>	
					</div>
				</div>
	

</body>
</html>