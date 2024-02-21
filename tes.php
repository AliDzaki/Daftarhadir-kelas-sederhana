<!DOCTYPE html>
<html>
<head>
    <title>Sorting Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Data Pengguna</h2>
    <table class="table">
        <thead>
            <tr>
                <th><a href="?sort=id&order=<?php echo $sort == 'id' && $order == 'asc' ? 'desc' : 'asc'; ?>">ID</a></th>
                <th><a href="?sort=nama&order=<?php echo $sort == 'nama' && $order == 'asc' ? 'desc' : 'asc'; ?>">Nama</a></th>
                <th><a href="?sort=umur&order=<?php echo $sort == 'umur' && $order == 'asc' ? 'desc' : 'asc'; ?>">Umur</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Koneksi ke database
            $conn = mysqli_connect("localhost", "root", "", "daftar_hadir");

            // Cek koneksi
            if (!$conn) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }

            // Sorting
            $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
            $order = isset($_GET['order']) ? $_GET['order'] : 'asc';
            $sql = "SELECT * FROM users ORDER BY $sort $order";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['umur'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
            }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>

</body>
</html>