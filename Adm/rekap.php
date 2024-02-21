<?php

session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['role'] == '') {
    header("location:../index.php");
}

// function sorting table
function sortTable1($column, $order)
{
    global $conn;

    //membuat array
    $columns = array('nisn', 'nama', 'tanggal');
    $column = in_array($column, $columns) ? $column : 'tanggal';
    $sort_order = strtoupper($order) === 'DESC' ? 'DESC' : 'ASC';

    $query = "SELECT * FROM vrekap  ORDER BY $column $sort_order";
    $result = query($query);

    return $result;
}



require '../koneksi.php';
$kehadiran = query("SELECT * FROM vrekap ORDER BY tanggal  DESC");

if (isset($_POST["cari"])) {
    $kehadiran = cari($_POST["keyword"]);
}
if (isset($_POST["filter"])) {
    global $kehadiran;
    $kehadiran = filterAdm($_POST["kriteria"]);
}

// Ambil kolom dan jenis sorting dari URL
$column = isset($_GET['column']) ? $_GET['column'] : 'tanggal';
$order = isset($_GET['order']) ? $_GET['order'] : 'DESC';

if(isset($_GET["column"]) && isset($_GET["order"])){
$kehadiran = sortTable1($column, $order);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rekap Kehadiran</title>
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



        #cari {
            padding-left: 45px;
            padding-right: 45px;
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

            /* Add padding to the main content to create separation */
        }

        #judul {
            position: absolute;
            top: 5px;
            left: 110vh;
            background-color: white;
            margin-bottom: 20px;
        }

        #print {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        th,
        td {
            text-align: center;
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
                    <a class="nav-link text-black link-dark" href="daftar_hadir.php">
                        <img src="images/keh.png" style="width: 20px; height:20px;" />
                        Daftar Hadir
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black link-dark active" aria-current="true" href="logout.php"
                        style="background-color: #f7f7f7; ">
                        <img src="images/rekap.png" style="width: 20px; height:20px;" />
                        Rekap Kehadiran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black link-dark" href="data_siswa.php">
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

            <hr>
            <h2 class="" id="judul">
                Rekap Kehadiran
            </h2>

            <br>
            <div class="container">
                <div class="row">
                    <div id="print">
                        <a href="print.php" class="btn btn-outline-success mr-1 mb-3" style="width:75px;">Print</a>
                        <a href="rekap.php" class="btn btn-outline-danger mr-1 mb-3" style="width:75px;">Reset</a>
                    </div>

                    <div class="mb-3" id="cari">
                        <div class="row g-3">
                            <form class="col-sm-4 " style="margin-right: 10px; margin-left:15px;" method="post">
                                <div class="d-flex">
                                    <select name="kriteria" id="krt" class="form-select form-select" required>
                                        <option value="">-----</option>
                                        <option value="Hadir">hadir</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="izin">izin</option>
                                        <option value="alpa">Alpa</option>
                                    </select>
                                    <button class="btn btn-outline-success ml-1" type="submit"
                                        name="filter">Filter</button>
                                </div>
                            </form>

                            <form class="col-sm-7" method="post">
                                <div class="d-flex">
                                    <input class="form-control me-10" type="text" placeholder="Search" name="keyword"
                                        aria-label="Search" autocomplete="off">
                                    <button class="btn btn-outline-success ml-1" type="submit"
                                        name="cari">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <table class="table table-striped ">
                    <tr>
                        <th><a href="?column=nisn&order=<?= $order === 'DESC' ? 'ASC' : 'DESC' ?>"
                                class="text-dark">NISN</a></th>
                        <th><a href="?column=nama&order=<?= $order === 'DESC' ? 'ASC' : 'DESC' ?>"
                                class="text-dark">NAMA</a></th>
                        <th>KEHADIRAN</th>
                        <th><a href="?column=tanggal&order=<?= $order === 'DESC' ? 'ASC' : 'DESC' ?>"
                                class="text-dark">TANGGAL KEHADIRAN</a></th>
                    </tr>
                    <?php foreach ($kehadiran as $keh) { ?>
                        <tr>
                            <td>
                                <?= $keh["nisn"] ?>
                            </td>
                            <td>
                                <?= $keh["nama"] ?>
                            </td>
                            <td>
                                <?= $keh["kehadiran"] ?>
                            </td>
                            <td>
                                <?= $keh["tanggal"] ?>
                            </td>

                            <td>
                                <a href="hapus_keh.php?id_datakehadiran=<?= $keh["id_datakehadiran"] ?>" class="btn btn-success 
btn-sm" onclick="return confirm('yakin?');">HAPUS</a>
                                <a href="ubah_keh.php?id_datakehadiran=<?= $keh["id_datakehadiran"] ?>" class="btn btn-success 
btn-sm" onclick="return confirm('yakin?');">UBAH</a>
                            </td>

                        </tr>
                    <?php } ?>
                </table>
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