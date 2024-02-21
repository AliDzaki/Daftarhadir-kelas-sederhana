<?php

session_start();
 
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['role']==''){
    header("location:../index.php");
}



// Halaman admin/index.php
// ... (Kode halaman admin)

require '../koneksi.php';


if(isset ($_POST["signin"])){

  if( register($_POST)>0){
      echo"<script>
      alert('user baru berhasil ditambahkan!');
      </script>";
  }else{
    echo mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>

  </style>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah akun</title>
</head>

<body>
<a href="index.php" class="btn btn-light btn border border-black" id="back">
                <i class="bi bi-arrow-left-circle"></i>
                Kembali
            </a>
  <section class="vh-80 gradient-custom">
    <div class="container py-5 h-80">
      <div class="row d-flex justify-content-center align-items-center h-80">

        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card  text-black" style="border-radius: 1rem; background-color: #f7f7f7;">
            <div class="card-body p-4 text-center">

              <div class="mb-md-5 mt-md-4 pb-2 ">

                <h2 class="fw-bold mb-2 ">Tambah User</h2>
                <p class="text-black-50 mb-5 mt-3">Tambahkan akun</p>
                <form action="" method="post">
                  <div class="form-floating mb-4 form-white text-black">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" autocomplete="off">
                    <label for="floatingInput">Username</label>
                  </div>

                  <div class="form-floating mb-4 form-white text-black">
                    <input type="password" class="form-control" id="floatingInput" placeholder="password" name="password">
                    <label for="floatingInput">password</label>
                  </div>
                  <div class="form-floating mb-4 form-white text-black">
                    <input type="text" class="form-control" id="floatingInput" placeholder="role" name="role">
                    <label for="floatingInput">role</label>
                  </div>
                  <button class="shadow-lg btn btn-outline-dark btn-lg px-5 text-black " id="btn"
                    style="background-color: #dbd7d7;" type="submit" name="signin">Tambah</button>
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