<?php



session_start();
 
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['role']==''){
    header("location:../index.php");
}



require '../koneksi.php';

$conn = mysqli_connect("localhost", "root", "", "daftar_hadir");

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    //cek apakah data berhasil ditampilkan atau tidak
    if (tambah_keh($_POST) > 0) {
        echo "
            <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'daftar_hadir.php'
            </script>
        ";

    } else {
        echo "
     <script>
     alert('data gagal ditambahkan');
     document.location.href = 'daftar_hadir.php'
     </script>
 ";
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar hadir</title>
    <!-- bootstrap 5 css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
        integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />
    <!-- custom css -->
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <style>
        li {
            list-style: none;
            margin: 20px 0 20px 0;
        }

        a {
            text-decoration: none;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            margin-left: 0;
            transition: 0.4s;
            z-index: 1;

            /* Ensure sidebar is above other content */
        }

        .contain {
           
        }





        .active-sidebar {
            margin-left: 0;
        }

        #main-content {
            transition: 0.4s;
            margin-left: 250px;
            padding-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url(images/bgdh.jpg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 100vh;


            /* Adjusted to match the active state */
        }

        .main-content-padding {
            padding: 20px;
            /* Add padding to the main content to create separation */
        }

        .container-form {
            width: 400px;
            height: 500px;
            background-color: #f7f7f7;
            padding: 20px;
           border-radius: 6%;
            



        }
    </style>
</head>

<body>
    <div class="contain ">
        <div>
            <div class="sidebar p-2 shadow" id="sidebar" style="background-color: rgb(209, 216, 224);">
                <h2 class="mb-5 text-black mt-3">Daftar Hadir</h2>
                <li class="nav-item">
                    <a class="nav-link text-black link-dark" href="index.php">
                        <i class="bi bi-house-door-fill"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black link-dark active" aria-current="true" href="#"
                        style="background-color: #f7f7f7;">
                        <img src="images/keh.png" style="width: 20px; height:20px;" />
                        Daftar Hadir
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black link-dark" href="rekap.php">
                        <img src="images/rekap.png" style="width: 20px; height:20px;" />
                        Rekap Kehadiran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black link-dark " href="data_siswa.php">
                        <img src="images/siswa.png" style="width: 25px; height:25px;" />
                        Data Siswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black link-dark" href="sign_in.php">
                    <i class="bi bi-person-plus-fill"></i>
                        Tambahkan Akun
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black link-dark" href="logout.php">
                        <img src="images/logout.png" style="width: 25px; height:25px;" />
                        Log out
                    </a>
                </li>
            </div>
        </div>
        <div id="main-content">
            <div class="container-form shadow-lg border border-black">
                <h3 class="text-center mt-2">Daftar Hadir</h3>

                <form action="" method="post">
                    <div class="row g-3">

                        <div class="mb-3">
                            <label class="form-label" for="nisn">Nama</label>
                            <select name="nisn" id="nisn" class="form-select form-select-sm" required>
                                <option value="">-----</option>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM siswa") or die(mysqli_error($conn));

                                while ($data = mysqli_fetch_array($query)) {
                                    echo "<option value=$data[nisn]>$data[nama]($data[nisn])</option>";
                                }
                                ?>

                            </select>
                        </div>



                        <div class="mb-3">
                            <label class="form-label" for="ket">Kehadiran</label>
                            <select name="kehadiran" id="ket" class="form-select form-select-sm" required>
                                <option value="">-----</option>
                                <option value="Hadir">hadir</option>
                                <option value="Sakit">Sakit</option>
                                <option value="izin">izin</option>
                                <option value="alpa">Alpa</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="tgl">Tanggal</label>
                            <input name="tgl_keterangan" id="tgl" type="text" class="form-control form-control-sm"
                                disabled value="<?= date('l, d-m-Y');?>">
                        </div>
                        
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-sm mt-2">Tambah</button>

                </form>
            </div>


        </div>
    </div>

    <!-- Remove script toggle button -->
</body>
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"
    integrity="sha384-u7v+K+dVVBiFgX8lDekGEVg3xFfR1UqbI6F2n6bZlpTo5y6Pc1mp8tI6P8GUfNPy"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-Z9tm5zciJryVXoBO8BqziI7GMkMvZlqUL9Nrfjw5bBw6O2sFQv6DQpWPSK1RfU" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"
    integrity="sha384-AKJ5gsZXHZAeL7v7eCFZD2PXj6lU6blHz03g75Mz7EwM9xI47P6Fb8jD2JKQlGSM"
    crossorigin="anonymous"></script>

</html>