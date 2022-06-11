<?php  
$conn = mysqli_connect('localhost','root','','db_login');

if (mysqli_connect_errno()) {
    echo 'Koneksi gagal terhubung' . mysqli_connect_error();
}
?>