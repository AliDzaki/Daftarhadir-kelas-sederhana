<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
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
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;

        }





        .active-sidebar {
            margin-left: 0;
        }

        #main-content {
            transition: 0.4s;
            margin-left: 260px;
            padding-top: 10px;


            /* Adjusted to match the active state */
        }

        .main-content-padding {
            padding: 20px;
            /* Add padding to the main content to create separation */
        }
    </style>
</head>
<?php
session_start();
 
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['role']==''){
    header("location:../index.php");
}

?>
<body>
    <div class="contain ">
        <div>
            <div class="sidebar p-2 shadow" id="sidebar" style="background-color: rgb(209, 216, 224);">
                <h2 class="mb-5 text-black mt-3">Daftar Hadir</h2>
                <li class="nav-item">
                    <a class="nav-link text-black link-dark active " aria-current="true"
                        style="background-color: #f7f7f7;" href="#">
                        <i class="bi bi-house-door-fill"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black link-dark" href="daftar_hadir.php">
                        <img src="../Adm/images/keh.png" style="width: 20px; height:20px;" />
                        Daftar Hadir
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black link-dark" href="rekap.php">
                        <img src="../Adm/images/rekap.png" style="width: 20px; height:20px;" />
                        Rekap Kehadiran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black link-dark" href="data_siswa.php">
                        <img src="../Adm/images/siswa.png" style="width: 25px; height:25px;" />
                        Data Siswa
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
        <div>
            <div class="row justify-content-md-center" id="main-content">
           

                <div class="card col-4 mr-5">
                    <img src="../Adm/images/t1.png" class="card-img-top ">
                    <div class="card-body ">
                        <h5 class="card-title">Daftar Hadir</h5>
                        <p class="card-text">Klik button dibawah untuk
                            langsung menuju ke halaman Daftar Hadir</p>
                        <a href="daftar_hadir.php" class="btn btn-secondary">Masuk</a>
                    </div>
                </div>
                <div class="card col-4 ">
                    <img src="../Adm/images/list.jpg" class="card-img-top ">
                    <div class="card-body ">
                        <h5 class="card-title">Rekap Kehadiran</h5>
                        <p class="card-text">Klik button dibawah untuk
                            langsung menuju ke halaman Rekap Kehadiran</p>
                        <a href="rekap.php" class="btn btn-secondary">Masuk</a>
                    </div>
                </div>

                <div class="card col-5 mt-4 mb-5">
                    <img src="../Adm/images/DS.jpg" class="card-img-top ">
                    <div class="card-body ">
                        <h5 class="card-title">Data Siswa</h5>
                        <p class="card-text">Klik button dibawah untuk menuju halaman yang berisi data siswa</p>

                        <a href="data_siswa.php" class="btn btn-secondary">Masuk</a>
                    </div>
                </div>

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