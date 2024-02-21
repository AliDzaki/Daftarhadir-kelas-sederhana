<?php




require '../koneksi.php';
$id = $_GET["id_datakehadiran"];

//query data mahasiswa berdasarkan nrp
$ambil = query("SELECT * FROM vrekap WHERE id_datakehadiran = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"])){        
    //cek apakah data berhasil diubah atau tidak
    if(ubah_keh($_POST) > 0){
        echo "
            <script>
            alert('data berhasil diubah');
            document.location.href = 'rekap.php'
            </script>
        ";

    }else{
		mysqli_error($conn);
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ubah Data</title>
    <!-- bootstrap 5 css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
        integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />
    <!-- custom css -->
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <style>
        
        .contain {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;

        }
        #back {
            position: absolute;
            top: 5px;
            left: 5px;
        }
        .container-form {
            width: 400px;
            height: 500px;
            background-color: #f7f7f7;
            padding: 20px;
            position: absolute;
            top: 65px;
            left: 470px;



        }
    </style>
</head>

<body>
    <div class="contain ">
    <a href="rekap.php" class="btn btn-light btn border border-black" id="back">
                <i class="bi bi-arrow-left-circle"></i>
                Kembali
            </a>
        <div id="main-content">
            <div class="container-form shadow-lg border border-black">
                <h3 class="text-center mt-2">Ubah Daftar Hadir</h3>

                <form action="" method="post" >
                    <div class="row g-3">

                        <div class="mb-3">
                            <label class="form-label" for="nisn">Nisn</label>
                            <input type="text" id="nisn" value="<?= $ambil["nisn"];?>" disabled class="form-control form-control-sm">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama</label>
                            <input type="text" id="nama" value="<?= $ambil["nama"];?>" disabled class="form-control form-control-sm">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="ket">Kehadiran</label>
                            <select name="kehadiran" id="ket" class="form-select form-select-sm" required  value="<?= $ambil["nisn"];?>" >
                                
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
                    <button type="submit" name="submit" class="btn btn-primary btn-sm mt-2" >Ubah</button>

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