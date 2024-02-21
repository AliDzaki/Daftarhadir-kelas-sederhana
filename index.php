<?php
require 'koneksi.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Halaman Login</title>
  <style>

  </style>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
  <?php 
	if(isset($_GET['pesan1'])){
		if($_GET['pesan1']=="gagal1"){
			echo "<div class='alert'>Username dan Password belum diisi !</div>";
		}
	}
	?>
  <?php 
	if(isset($_GET['pesan2'])){
		if($_GET['pesan2']=="gagal2"){
			echo "<div class='alert'>User tidak ditemukan!</div>";
		}
	}
	?>
  
  <section class="vh-80 gradient-custom">
    <div class="container py-5 h-80">
      <div class="row d-flex justify-content-center align-items-center h-80">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card  text-black" style="border-radius: 1rem; background-color: #f7f7f7;">
            <div class="card-body p-4 text-center">

              <div class="mb-md-5 mt-md-4 pb-2 ">

                <h2 class="fw-bold mb-2 ">Login</h2>
                <p class="text-black-50 mb-5 mt-3">Isi username dan password mu!</p>
                <?php
    if (isset($_GET['pesan1'])) {
        if ($_GET['pesan1'] == "gagal1") {
            echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>Username atau Password salah
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
      }
      if (isset($_GET['pesan3'])) {
        if ($_GET['pesan3'] == "gagal3") {
            echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>User atau akun tidak ditemukan
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
      }
?>
                <form action="cek_login.php" method="post">
                  
                <div class="form-floating mb-4 form-white text-black">
                
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com"  autocomplete="off">
                    <label for="floatingInput">Username</label>
                </div>

                <div class="form-floating mb-4 form-white text-black">
                  <input type="password" name="password" class="form-control" id="floatingInput" placeholder="password"  >
                  <label for="floatingInput">password</label>
                  
                </div>

                

                <button class="shadow-lg btn btn-outline-dark btn-lg px-5 text-black " id="btn"
                  style="background-color: #dbd7d7;" type="submit" name="login">Login</button>

                  </form>
              </div>
             



            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>