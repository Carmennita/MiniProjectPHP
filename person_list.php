<?php
$ar_judul = ['','NO', 'NAMA', 'GENDER', 'AGAMA', 'TEMPAT LAHIR', 'TANGGAL LAHIR', 'ALAMAT', 'ASAL KAMPUS', 'NO HP', 'EMAIL', 'SOSIAL MEDIA', 'FOTO', 'QUOTES'];

$obj_person = new Person();
$rs = $obj_person->index();

$id = $_REQUEST['id'];

$keyword = $_GET['keyword'];
if (!empty($keyword)) {

    $ps = $obj_person->cari($keyword);
    $ps->execute();
    $rs = $ps->fetchAll();

} else if (!empty($id)) {
    $rs = $obj_person->filter($id);
} else {
    $rs = $obj_person->index();
}

$itemsPerPage = 8; 
$totalItems = count($rs); 

// Hitung jumlah total halaman
$totalPages = ceil($totalItems / $itemsPerPage);

// Tentukan halaman saat ini (biasanya dari parameter URL)
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Hitung indeks data yang akan ditampilkan pada halaman saat ini
$startIndex = ($currentPage - 1) * $itemsPerPage;
$endIndex = $startIndex + $itemsPerPage;

// Membuat nomor berurutan
$no = $startIndex + 1;

// Filter data yang sesuai dengan halaman saat ini
$dataToShow = array_slice($rs, $startIndex, $itemsPerPage);
?>

<br>
<h3 class="page-section-heading text-center text-uppercase text-primary">Daftar Para Peserta MSIB 5</h3>
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
      foreach ($dataToShow as $peserta) {
      ?>
        <tr>
        <td>
            <form method="POST" action="person_controller.php">
              <a href="index.php?hal=person_detail&id=<?= $peserta['id'] ?>"
                 title="Detail Person" class="btn btn-info btn-sm">
                <i class="bi bi-eye"></i>
              </a>
              <?php if(isset($_SESSION['login'])){ ?>
                <a href="index.php?hal=person_form&id=<?= $peserta['id'] ?>"
                 title="Ubah Person" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i>
                </a>
                <?php if($_SESSION['login']['role'] === 'admin' || $_SESSION['login']['role'] === 'staff'){ ?>
                  <button type="submit" title="Hapus Peserta" class="btn btn-danger btn-sm"
                      name="proses" value="hapus" onclick="return confirm('Anda Yakin diHapus?')">
                    <i class="bi bi-trash"></i>
                  </button>
                  <input type="hidden" name="id" value="<?= $peserta['id'] ?>" />
                <?php } ?>
              <?php } ?>
            </form>
          </td>
          <td><?= $no ?></td>
          <td><?= $peserta['nama'] ?></td>
          <td><?= $peserta['gender'] ?></td>
          <td><?= $peserta['agama'] ?></td>
          <td><?= $peserta['tempat_lahir'] ?></td>
          <td><?= $peserta['tgl_lahir'] ?></td>
          <td><?= $peserta['alamat'] ?></td>
          <td><?= $peserta['asal_kampus'] ?></td>
          <td><?= $peserta['hp'] ?></td>
          <td><?= $peserta['email'] ?></td>
          <td><?= $peserta['sosmed'] ?></td>
          <td>
            <img src="<?= $peserta['foto'] ?>" width="50%" />
            <?php if (!empty($peserta['foto'])) { ?>
              <img src="<?= $peserta['foto'] ?>" width="50%" />
            <?php } else { ?>
              <img src="images/nophoto.jpg" width="50%" />
            <?php } ?>
          </td>
          <td><?= $peserta['quotes'] ?></td>
        </tr>
      <?php
        $no++; 
      }
      ?>
    </tbody>
  </table>
</div>

<div class="pagination justify-content-center">
  <?php
  if ($currentPage > 1) {
      echo '<a href="index.php?hal=person_list&page=' . ($currentPage - 1) . '" class="btn btn-outline-primary">Halaman Sebelumnya</a>';
  }
  if ($currentPage < $totalPages) {
      echo '<a href="index.php?hal=person_list&page=' . ($currentPage + 1) . '" class="btn btn-outline-primary">Halaman Berikutnya</a>';
  }
  ?>
</div>
