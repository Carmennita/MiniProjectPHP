<?php
class Person{
    //member1 variabel
	private $koneksi;
	//member2 konstruktor
	public function __construct(){
		global $dbh;
		$this->koneksi = $dbh;
	}
    //member3 fungsionalitas
    public function index(){
        $sql = "SELECT person.*, agama.nama AS agama
                FROM person INNER JOIN agama
                ON agama.id = person.idagama ORDER BY person.id DESC";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll();
		return $rs;
    }

    public function simpan($data){
        $sql = "INSERT INTO person (nama,gender,idagama,tempat_lahir,tgl_lahir,alamat,hp,email,sosmed,asal_kampus,quotes,foto)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
    }

    public function getPerson($id){
        $sql = "SELECT person.*, agama.nama AS agama
                FROM person INNER JOIN agama
                ON agama.id = person.idagama WHERE person.id = ?";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute([$id]);
		$rs = $ps->fetch();
		return $rs;
    }

    public function ubah($data){
        $sql = "UPDATE person SET nama=?,gender=?,idagama=?,tempat_lahir=?,tgl_lahir=?,alamat=?,hp=?,email=?,sosmed=?,asal_kampus=?,quotes=?,foto=?
                WHERE id = ?";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
    }

    public function hapus($id){
        $sql = "DELETE FROM person WHERE id = ?";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute([$id]);
    }

    public function cari($keyword){
        $sql = "SELECT person.*, agama.nama AS agama
                FROM person INNER JOIN agama
                ON agama.id = person.idagama 
                WHERE person.nama LIKE '%$keyword%' OR 
                agama.nama LIKE '%$keyword%' OR 
                person.gender LIKE '%$keyword%' OR
                person.asal_kampus LIKE '%$keyword%' OR
                person.alamat LIKE '%$keyword%' OR
                person.tempat_lahir LIKE '%$keyword%'";
    
        // PDO prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute(); 
        return $ps; 
    }    

    public function filter($jenis){
        $sql = "SELECT person.*, agama.nama AS agama
                FROM person INNER JOIN agama
                ON agama.id = person.idagama 
                WHERE agama.id = ?
                ORDER BY person.id DESC";
		$ps = $this->koneksi->prepare($sql);
		$ps->execute([$jenis]);
		$rs = $ps->fetchAll();
		return $rs;
    }
}
?>