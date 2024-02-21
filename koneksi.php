<?php
$conn = mysqli_connect("localhost", "root", "", "daftar_hadir");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahSiswa($data)
{

    global $conn;
    //ambil data dari tiap elemen dalam form
    if (isset($_POST["submit"])) {
        //cek apakah data berhasil ditampilkan atau tidak
        $nisn = $_POST["nisn"];
        $nama = $_POST["nama"];
        $kelamin = $_POST["kelamin"];
        $tgl_lahir = $_POST["tgl_lahir"];

        $query = "INSERT INTO siswa 
                    VALUES
                   ('$nisn','$nama','$kelamin','$tgl_lahir')";
        mysqli_query($conn, $query);

    }


    return mysqli_affected_rows($conn);
}

function hapus_siswa($nisn)
{
    global $conn;
    $sql = mysqli_query($conn, "DELETE FROM siswa WHERE nisn = $nisn");
    return mysqli_affected_rows($conn);
}

function hapus_keh($id)
{
    global $conn;
    $sql = mysqli_query($conn, "DELETE FROM data_kehadiran WHERE id_datakehadiran = $id");
    return mysqli_affected_rows($conn);
}

function ubah_siswa($data)
{

    global $conn;
    //ambil data dari tiap elemen dalam form

    $nisn = $_GET["nisn"];

    $nama = htmlspecialchars($data["nama"]);

    $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);



    //query insert data
    $query = "UPDATE siswa
   SET 
    nama = '$nama',  tgl_lahir = '$tgl_lahir'
   WHERE nisn =  '$nisn' ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function ubah_keh($data)
{

    global $conn;
    //ambil data dari tiap elemen dalam form

    $id = $_GET["id_datakehadiran"];
    $keterangan = htmlspecialchars($data["kehadiran"]);



    //query insert data
    $query = "UPDATE data_kehadiran
   SET 
   kehadiran = '$keterangan'
   WHERE id_datakehadiran =  '$id' ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function tambah_keh($data)
{
    global $conn;
    //ambil data dari tiap elemen dalam form
    if (isset($_POST["submit"])) {
        //cek apakah data berhasil ditampilkan atau tidak
        $nisn = $_POST["nisn"];

        $kehadiran = $_POST["kehadiran"];



        $query = "INSERT INTO data_kehadiran
                    VALUES
                   ('','$nisn','$kehadiran',NOW())";
        mysqli_query($conn, $query);

    }


    return mysqli_affected_rows($conn);
}

function tambah_kehSiswa($data,$nisn)
{
    global $conn;
    //ambil data dari tiap elemen dalam form    
    if (isset($_POST["submit"])) {
        //cek apakah data berhasil ditampilkan atau tidak
        $nisn = $_POST["nisn"];

        $kehadiran = $_POST["kehadiran"];

        $query = "INSERT INTO data_kehadiran
                    VALUES
                   ('','$nisn','$kehadiran',NOW())";
        mysqli_query($conn, $query);

    }


    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    global $conn;
    $query = "SELECT * FROM vrekap WHERE nama LIKE '%$keyword%' OR nisn LIKE '%$keyword%' OR kehadiran LIKE '%$keyword%' OR tanggal LIKE '%$keyword%'";
    return query($query);
}



function filter($keyword, $nama)
{
    global $conn;
    $query = "SELECT * FROM vrekap WHERE kehadiran LIKE '%$keyword%' && nisn='$nama'";
    return query($query);
}

function filterAdm($keyword)
{
    global $conn;
    $query = "SELECT * FROM vrekap WHERE kehadiran = '$keyword'";
    return query($query);
}

function register($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password1 = mysqli_real_escape_string($conn, $data["password"]);
    $role = $data["role"];

    //cek username udah ada atau belum
    $result = mysqli_query($conn, "SELECT nama_pengguna FROM user WHERE nama_pengguna = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username sudah terdaftar!!')
        </script>";

        return false;

    }

    function sortTableSiswa($column, $order, $username)
{
    global $conn;

    $columns = array('nisn', 'nama', 'kehadiran', 'tanggal');
    $column = in_array($column, $columns) ? $column : 'tanggal';
    $sort_order = strtoupper($order) === 'DESC' ? 'DESC' : 'ASC';

    $query = "SELECT * FROM vrekap WHERE nisn = $username ORDER BY $column $sort_order";
    $result = query($query);

    return $result;
}



    //enkripsi password


    //tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password1','$role')");
    return true;
}
?>