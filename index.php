<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CP</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
<div class="container-fluid">
<?php
include_once 'koneksi.php';
include_once 'models/Person.php';
include_once 'models/agama.php';
include_once 'models/login.php';
?>
<div class="row flex-nowrap">
    <div class="row">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-body-secondary">
            <?php
            include_once 'sidebar.php';
            ?>
        </div>
        <div class="col-md-10">
        <?php
                include_once 'navbar.php';
                // Set error_reporting level to E_ERROR
                error_reporting(E_ERROR);
               //tangkap request di URL
               $hal = $_REQUEST['hal'];
               //tempatkan halaman sesuai request di URL 
               if(!empty($hal)){
                    include_once $hal.'.php';
               }
               else{
                    include_once 'home.php';
               }
               ?>
               

        </div>
    </div>
</div>
<?php
    include_once 'footer.php';
?>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
