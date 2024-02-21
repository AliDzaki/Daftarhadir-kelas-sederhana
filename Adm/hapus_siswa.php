<?php
require '../koneksi.php';

$nisn = $_GET["nisn"];

if( hapus_siswa($nisn) > 0){
    
    echo "
    <script>
    alert('data berhasil dihapus');
    document.location.href = 'data_siswa.php'
    </script>
";

}else{
    echo ("Deskripsi error : " .mysqli_error($conn));
}
 
?>