<?php
// session_start();
include_once 'koneksi.php';
include_once 'models/login.php';
$nama = $_POST['nama']; 
$email = $_POST['email']; 
$uname = $_POST['uname']; 
$pass = $_POST['pass']; 
$role = $_POST['role'];  
$tombol = $_POST['proses'];
//2. simpan ke sebuah array
$data = [
    $nama, 
    $email,
    $uname,
    $pass,
    $role,
];
//3. eksekusi tombol
$obj_login = new login();
switch ($tombol) {
    case 'simpan': $obj_login->simpan($data); break;
    case 'ubah': 
        $data[] = $_POST['idx']; ;
        $obj_login->ubah($data); break;
    case 'hapus': $obj_login->hapus($_POST['id']); break;

    default: header('location:index.php?hal=user_list'); break;

    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

}
//4. setelah selasai arahkan ke hal
header('location:index.php?hal=user_list');

//----------proses pencarian data---------------
$tombol_cari = $_GET['proses_cari'];

if(isset($tombol_cari)){
    $obj_person->cari($_GET['keyword']); 
    header('location:index.php?hal=user_list');
}
