<?php
include_once 'koneksi.php';
include_once 'models/Person.php';
include_once 'models/agama.php';
//1. tangkap request form (dari name2 element form)
$nama = $_POST['nama']; 
$gender = $_POST['gender']; 
$agama = $_POST['idagama']; 
$tempat_lahir = $_POST['tempat_lahir']; 
$tgl_lahir = $_POST['tgl_lahir']; 
$alamat = $_POST['alamat']; 
$hp = $_POST['hp']; 
$email = $_POST['email']; 
$sosmed = $_POST['sosmed']; 
$asal_kampus = $_POST['asal_kampus']; 
$quotes = $_POST['quotes']; 
$foto = $_POST['foto']; 
$tombol = $_POST['proses'];
//2. simpan ke sebuah array
$data = [
    $nama,
    $gender,
    $agama,
    $tempat_lahir,
    $tgl_lahir,
    $alamat,
    $hp,
    $email,
    $sosmed,
    $asal_kampus,
    $quotes,
    $foto,
];
//3. eksekusi tombol
$obj_person = new Person();
switch ($tombol) {
    case 'simpan': $obj_person->simpan($data); break;
    case 'ubah': 
        $data[] = $_POST['idx']; ;
        $obj_person->ubah($data); break;
    case 'hapus': $obj_person->hapus($_POST['id']); break;

    default: header('location:index.php?hal=person_list'); break;

    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

}
//4. setelah selasai arahkan ke hal
header('location:index.php?hal=person_list');


$tombol_cari = $_GET['proses_cari']; 

if(isset($tombol_cari)){
 
    $obj_person->cari($_GET['keyword']); 
    header('location:index.php?hal=person_list');
}
