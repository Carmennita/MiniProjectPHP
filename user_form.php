<?php
$obj_login = new login();
$rs = $obj_login->index();
$ar_role = ['admin', 'staff'];

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;  // Tangkap request id di URL
// Periksa apakah 'id' ada dalam URL
if (!empty($id)) {
    // Mode edit data, form akan terisi dengan data lama yang ingin diubah
    $row = $obj_login->getlogin($id);
} else {
    // Mode input data baru, form dalam keadaan kosong
    $row = [];
}
?>

<?php
    if(empty($id)){ 
?>
        <br><h3 class="page-section-heading text-center text-uppercase text-primary">Tambah Data User</h3>
<?php
    }
    else{ 
?>
        <br><h3 class="page-section-heading text-center text-uppercase text-primary">Edit Data User</h3>
<?php } ?>

<div class="container px-5 my-5">
    <form id="contactForm" method="POST" action="user_controller.php">
        <div class="form-floating mb-3">
            <input class="form-control" name="nama" value="<?= $row['nama'] ?>" id="nama" type="text" placeholder="Nama" data-sb-validations="required" />
            <label for="nama">Nama</label>
            <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="email" value="<?= $row['email'] ?>" id="email" type="text" placeholder="Email" data-sb-validations="required" />
            <label for="email">Email</label>
            <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="uname" value="<?= $row['uname'] ?>" id="username" type="text" placeholder="Username" data-sb-validations="required" />
            <label for="username">Username</label>
            <div class="invalid-feedback" data-sb-feedback="username:required">Username is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="pass" value="<?= $row['pass'] ?>" id="password" type="text" placeholder="Password" data-sb-validations="required" />
            <label for="password">Password</label>
            <div class="invalid-feedback" data-sb-feedback="password:required">Password is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Role</label>
            <?php
            foreach($ar_role as $role){
                $cek = ($role == $row['role']) ? "checked" : "" ;
            ?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="staff" value="<?= $role ?>" type="radio" name="role" data-sb-validations="required" <?= $cek ?>/>
                <label class="form-check-label"><?= $role ?></label>
            </div>
            <?php
            }
            ?>
            <div class="invalid-feedback" data-sb-feedback="role:required">One option is required.</div>
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
            <a href="index.php?hal=user_list" class="btn btn-info" name="unproses">Kembali</a>
        </div>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>