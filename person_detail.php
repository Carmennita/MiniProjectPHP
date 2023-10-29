<?php
$id = $_REQUEST['id'];
$model = new Person(); 
$rs  = $model->getPerson($id);
?>
<div class="card">
  <?php
  if(!empty($rs['foto'])){
  ?>
	<img src="images/<?= $rs['foto'] ?>" class="card-img-top" />
  <?php
  }
  else{
  ?>
  <img src="images/nophoto.jpg" class="card-img-top" />
  <?php } ?>
  <div class="card-body">
    <h5 class="card-title"><?= $rs['nama'] ?></h5>
    <p class="card-text">
    <b>Quotes</b> : <br><?= $rs['quotes'] ?><br><hr>
        Jenis Kelamin : <?= $rs['gender'] ?><br>
        Agama : <?= $rs['agama'] ?><br>
        Tempat Lahir : <?= $rs['tempat_lahir'] ?><br>
        Tanggal Lahir : <?= $rs['tgl_lahir'] ?><br>
        Alamat : <?= $rs['alamat'] ?><br>
        Asal Kampus : <?= $rs['asal_kampus'] ?><br>
        Nomor HP : <?= $rs['hp'] ?><br>
        Email : <?= $rs['email'] ?><br>
        Sosial Media : <?= $rs['sosmed'] ?><br>
    </p>
  </div>
  <a href="index.php?hal=person_list" class="btn btn-primary">Kembali</a>
</div>