<?php
include 'connection.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM tb_shelf WHERE id = '$id'");

if ($query) {
    header("Location: shelf.php?msg=Data berhasil dihapus");
} else {
    echo "Gagal menghapus data.";
}
?>
