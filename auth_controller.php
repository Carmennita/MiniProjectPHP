<?php
session_start();
include_once 'koneksi.php';
include_once 'models/login.php';
//1. tangkap request form (dari name2 element form)
$uname = $_POST['uname']; 
$pass = $_POST['pass']; 
//2. simpan ke sebuah array
$data = [
    $uname,
    $pass,
];
//3. eksekusi tombol
$obj_login = new login();
$rs = $obj_login->auth($data);
if(!empty($rs)){ 
    $_SESSION['login'] = $rs;
    header('location:index.php?hal=person_list');
}
else{ 
    echo '<script>alert("Username/Password Anda Salah!!!");history.go(-1);</script>';
}

