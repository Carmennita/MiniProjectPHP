<?php
$ar_judul = ['','NO', 'NAMA', 'EMAIL', 'USERNAME', 'PASSWORD', 'ROLE'];

$obj_login = new login();
$rs = $obj_login->index();

$id = $_REQUEST['id'];

$keyword = $_GET['keyword']; // tangkap request pencarian berdasarkan keywordnya
if (!empty($keyword)) {
    // Menambahkan perintah eksekusi untuk objek PDOStatement
    $ps = $obj_login->cari($keyword);
    $ps->execute();
    $rs = $ps->fetchAll();
} else if (!empty($id)) {
    $rs = $obj_login->filter($id); // jika ada filter dari sidebar
} else {
    $rs = $obj_login->index(); // jika tidak ada pencarian
}

$no=1
?>

<br>
<h3 class="page-section-heading text-center text-uppercase text-primary">Daftar User Account</h3>
<a href="index.php?hal=user_form" class="btn btn-primary">Tambah</a>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <?php
        foreach ($ar_judul as $jdl) {
          echo '<th>' . $jdl . '</th>';
        }
        ?>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($rs as $usr) {
      ?>
        <tr>
        <td>
            <form method="POST" action="user_controller.php">
              <?php if(isset($_SESSION['login'])){ ?>
                <a href="index.php?hal=user_form&id=<?= $usr['id'] ?>"
                 title="Ubah user" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i>
                </a>
                <?php if($_SESSION['login']['role'] === 'admin' || $_SESSION['login']['role'] === 'staff'){ ?>
                  <button type="submit" title="Hapus user" class="btn btn-danger btn-sm"
                      name="proses" value="hapus" onclick="return confirm('Anda Yakin diHapus?')">
                    <i class="bi bi-trash"></i>
                  </button>
                  <input type="hidden" name="id" value="<?= $usr['id'] ?>" />
                <?php } ?>
              <?php } ?>
            </form>
          </td>
          <td><?= $no ?></td>
          <td><?= $usr['nama'] ?></td>
          <td><?= $usr['email'] ?></td>
          <td><?= $usr['uname'] ?></td>
          <td><?= $usr['pass'] ?></td>
          <td><?= $usr['role'] ?></td>
        </tr>
      <?php
        $no++;
      }
      ?>
    </tbody>
  </table>
</div>
