<?php
include 'connection.php';

// Cek apakah form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $shelf_code = mysqli_real_escape_string($conn, $_POST['shelf_code']);
    $name       = mysqli_real_escape_string($conn, $_POST['name']);
    $author     = mysqli_real_escape_string($conn, $_POST['author']);
    $amount     = (int) $_POST['amount'];
    $description  = mysqli_real_escape_string($conn, $_POST['description']);
    $synopsis   = mysqli_real_escape_string($conn, $_POST['synopsis']);
    $genre      = mysqli_real_escape_string($conn, $_POST['genre']);
    $publish   = mysqli_real_escape_string($conn, $_POST['publish']);


    // Proses upload gambar
    $image = $_FILES['image']['name'];
    $tmp    = $_FILES['image']['tmp_name'];
    $folder = 'images/';
    $path   = $folder . $image;
    $publish = $_POST['publish'];

    if (move_uploaded_file($tmp, $path)) {
        // Simpan ke database
        $insert = mysqli_query($conn, "INSERT INTO tb_shelf (shelf_code, nama, author, amount, description, synopsis, genre, publish, image) 
                                       VALUES ('$shelf_code', '$name', '$author', $amount, '$description', '$synopsis', '$genre', '$publish', '$image')");

        if ($insert) {
            header("Location: shelf.php?msg=Berhasil ditambahkan");
        } else {
            echo "Gagal menyimpan data ke database.";
        }
    } else {
        echo "Gagal upload gambar.";
    }
}
?>
