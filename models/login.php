<?php
class login{
    //login1 variabel
	private $koneksi;
	//login2 konstruktor
	public function __construct(){
		global $dbh; //memanggil variabel di file lain
		$this->koneksi = $dbh;
	}
    //login3 fungsionalitas
    public function index(){
        $sql = "SELECT * FROM login ORDER BY id DESC";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll();
		return $rs;
    }

    public function simpan($data){
        $sql = "INSERT INTO login (nama,email,uname,pass,role)
                VALUES (?,?,?,SHA1(MD5(SHA1(?))),?)";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
    }

    public function getlogin($id){
        $sql = "SELECT * FROM login WHERE id = ?";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute([$id]);
		$rs = $ps->fetch();
		return $rs;
    }

    public function ubah($data){
        $sql = "UPDATE login SET nama=?,email=?,uname=?,pass=SHA1(MD5(SHA1(?))),
                role=? WHERE id = ?";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
    }

    public function hapus($id){
        $sql = "DELETE FROM login WHERE id = ?";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute([$id]);
    }

    public function auth($data){
        $sql = "SELECT * FROM login WHERE uname = ? AND pass = SHA1(MD5(SHA1(?)))";
       
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
		$rs = $ps->fetch();
		return $rs;
    }
}