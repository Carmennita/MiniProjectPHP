<?php
$obj_agama = new agama();
$rs = $obj_agama->index();
$ar_gender = ['L', 'P'];

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;  // Tangkap request id di URL
$obj_person = new Person();

// Periksa apakah 'id' ada dalam URL
if (!empty($id)) {
    // Mode edit data, form akan terisi dengan data lama yang ingin diubah
    $row = $obj_person->getPerson($id);
} else {
    // Mode input data baru, form dalam keadaan kosong
    $row = [];
}
?>

<?php
    if(empty($id)){ //-----mode input data baru form kosong & tombol simpan--------
?>
        <br><h3 class="page-section-heading text-center text-uppercase text-primary">Tambah Data Peserta</h3>
<?php
    }
    else{ //-----mode edit data lama form terisi data lama & tombol ubah--------
?>
        <br><h3 class="page-section-heading text-center text-uppercase text-primary">Edit Data Peserta</h3>
<?php } ?>

<div class="container px-5 my-5">
    <form id="contactForm" method="POST" action="person_controller.php">
        <div class="form-floating mb-3">
            <input class="form-control" name="nama" value="<?= $row['nama'] ?>" id="namaLengkap" type="text" placeholder="Nama Lengkap" data-sb-validations="required" />
            <label for="namaLengkap">Nama Lengkap</label>
            <div class="invalid-feedback" data-sb-feedback="namaLengkap:required">Nama Lengkap is required.</div>
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Gender</label>
            <?php
            foreach($ar_gender as $gender){
                $cek = ($gender == $row['gender']) ? "checked" : "" ;
            ?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="<?= $gender ?>" type="radio" name="gender" data-sb-validations="required" <?= $cek ?>/>
                <label class="form-check-label"><?= $gender ?></label>
            </div>
            <?php
            }
            ?>
            <div class="invalid-feedback" data-sb-feedback="gender:required">One option is required.</div>
        </div>

        <div class="form-floating mb-3">
            <select class="form-select" name="idagama" id="agama" aria-label="Agama">
                <option value="Pilih Agama">Pilih Agama</option>
                <?php
                foreach($rs as $agama){
                    $sel = ($agama['id'] == $row['idagama']) ? "selected" : "" ;
                ?>
                <option value="<?= $agama['id'] ?>" <?= $sel ?>><?= $agama['nama'] ?></option>
                <?php
                }
                ?>
            </select>
            <label for="agama">Agama</label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="tempat_lahir" value="<?= $row['tempat_lahir'] ?>" id="tempatLahir" type="text" placeholder="Tempat Lahir" data-sb-validations="required" />
            <label for="tempatLahir">Tempat Lahir</label>
            <div class="invalid-feedback" data-sb-feedback="tempatLahir:required">Tempat Lahir is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="tgl_lahir" value="<?= $row['tgl_lahir'] ?>" id="tanggalLahir" type="text" placeholder="Tanggal Lahir" data-sb-validations="required" />
            <label for="tanggalLahir">Tanggal Lahir</label>
            <div class="invalid-feedback" data-sb-feedback="tanggalLahir:required">Tanggal Lahir is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="alamat" value="<?= $row['alamat'] ?>" id="alamat" type="text" placeholder="Alamat" data-sb-validations="required" />
            <label for="alamat">Alamat</label>
            <div class="invalid-feedback" data-sb-feedback="alamat:required">Alamat is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="hp" value="<?= $row['hp'] ?>" id="noHp" type="text" placeholder="No HP" data-sb-validations="required" />
            <label for="noHp">No HP</label>
            <div class="invalid-feedback" data-sb-feedback="noHp:required">No HP is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="email" value="<?= $row['email'] ?>" id="email" type="text" placeholder="Email" data-sb-validations="required" />
            <label for="email">Email</label>
            <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="sosmed" value="<?= $row['sosmed'] ?>" id="socialMedia" type="text" placeholder="Social Media" data-sb-validations="required" />
            <label for="socialMedia">Social Media</label>
            <div class="invalid-feedback" data-sb-feedback="socialMedia:required">Social Media is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="asal_kampus" value="<?= $row['asal_kampus'] ?>" id="asalKampus" type="text" placeholder="Asal Kampus" data-sb-validations="required" />
            <label for="asalKampus">Asal Kampus</label>
            <div class="invalid-feedback" data-sb-feedback="asalKampus:required">Asal Kampus is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="quotes" value="<?= $row['quotes'] ?>" id="qoutes" type="text" placeholder="Qoutes" data-sb-validations="required" />
            <label for="qoutes">Qoutes</label>
            <div class="invalid-feedback" data-sb-feedback="qoutes:required">Qoutes is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" type="file" name="foto" value="<?= $row['foto'] ?>" id="foto" placeholder="Foto" data-sb-validations="required" />
            <label for="foto">Foto</label>
        </div>

        <div class="text-center">
        <?php
        if(empty($id)){ 
        ?>
            <button class="btn btn-primary" name="proses" type="submit" value="simpan">Simpan</button>
        <?php
        }
        else{ 
        ?>
            <button class="btn btn-success" name="proses" type="submit" value="ubah">Ubah</button>
            <input type="hidden" name="idx" value="<?= $id ?>" />
        <?php } ?>
            <a href="index.php?hal=person_list" class="btn btn-info" name="unproses">Kembali</a>
        </div>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>