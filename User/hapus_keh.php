<?php
require '../koneksi.php';

$id = $_GET["id_datakehadiran"];

if( hapus_keh($id) > 0){
    
    echo "
    <script>
    alert('data berhasil dihapus');
    document.location.href = 'rekap.php'
    </script>
";

}else{
    echo ("Deskripsi error : " .mysqli_error($conn));
}
 
?>