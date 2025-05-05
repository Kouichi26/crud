<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['status_login'])) {
    echo "<script>window.location = 'login.php?msg=Login terlebih dahulu'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top px-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">Librarium</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="shelf.php">Rak</a></li>
                <li class="nav-item"><a class="nav-link" href="information.php">Informasi</a></li>

                <?php if ($_SESSION['ulevel'] == 'Admin' || $_SESSION['ulevel'] == 'Moderator'): ?>
                    <li class="nav-item"><a class="nav-link" href="user.php">Pengguna</a></li>
                <?php endif; ?>

            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                        <?= $_SESSION['uname'] ?> (<?= $_SESSION['ulevel'] ?>)
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="logout.php">Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
