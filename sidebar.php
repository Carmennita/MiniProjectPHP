<?php
// Logika untuk mengatur peran
$role = isset($_SESSION['login']['role']) ? $_SESSION['login']['role'] : 'guest';

?>

<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-primary min-vh-100">
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
        <?php
        if ($role === 'guest') {
            // Menu yang dapat diakses oleh semua orang
            ?>
            <li class="nav-item">
                <a href="login.php" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-person"></i> <span class="ms-1 d-none d-sm-inline">Login</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?hal=home" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house-door"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?hal=person_list" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Peserta</span>
                </a>
            </li>
        <?php }
        
        if ($role === 'admin' || $role === 'staff') {
            // Menu yang dapat diakses oleh admin dan staff
            ?>
            <li class="nav-item">
                <?= $_SESSION['login']['uname'] . ' - ' . $_SESSION['login']['role'] ?>
                <a href="logout.php" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-box-arrow-right"></i> <span class="ms-1 d-none d-sm-inline">Logout</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?hal=home" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house-door"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?hal=person_list" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Peserta</span>
                </a>
            </li>
            <?php
            // Hanya admin dan staff yang dapat mengakses menu "Tambah Data"
            if ($role === 'admin' || $role === 'staff') {
            ?>
            <li class="nav-item">
                <a href="index.php?hal=person_form" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-plus"></i> <span class="ms-1 d-none d-sm-inline">Tambah Data</span>
                </a>
            </li>
            <?php
            }
            // Hanya admin yang dapat mengakses menu "Kelola User"
            if ($role === 'admin') {
            ?>
            <li class="nav-item">
                <a href="index.php?hal=user_list" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-pencil"></i> <span class="ms-1 d-none d-sm-inline">Kelola User</span>
                </a>
            </li>
            <?php
            }
        }
        ?>
    </ul>
</div>
