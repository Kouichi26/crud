<?php
    session_start(); // mulai sesi

    // hapus semua data sesi
    session_unset();
    session_destroy();

    // redirect ke halaman login
    header("Location: login.php");
    exit;
?>