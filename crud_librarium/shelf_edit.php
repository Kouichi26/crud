<?php
include 'header.php';
$id = $_GET['id'] ?? null;

if ($id) {
    $query = mysqli_query($conn, "SELECT * FROM tb_shelf WHERE id = '$id'");
    $data = mysqli_fetch_assoc($query);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $deskripsi = mysqli_real_escape_string($conn, $_POST['description']);
        $kode_buku = mysqli_real_escape_string($conn, $_POST['shelf_code']);
        $image = $_POST['image'];
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $synopsis = mysqli_real_escape_string($conn, $_POST['synopsis']);
        $genre = mysqli_real_escape_string($conn, $_POST['genre']);
        $publish = mysqli_real_escape_string($conn, $_POST['publish']);

    
        $update = mysqli_query($conn, "UPDATE tb_shelf SET 
            nama='$nama', 
            description='$deskripsi', 
            synopsis='$synopsis',
            genre='$genre',
            publish='$publish',
            shelf_code='$kode_buku', 
            amount='$amount' 
            WHERE id='$id'");

        if ($update) {
            header("Location: shelf.php?msg=Berhasil diubah");
        } else {
            echo "Gagal mengupdate data.";
        }
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4">
            <h2 class="mb-4 text-center">Edit Data</h2>
            <form method="POST">
                <label class="form-label">Nama:</label><br>
                <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>"><br>
                
                <label class="form-label">Deskripsi:</label><br>
                <input type="text" class="form-control" name="description" value="<?= $data['description'] ?>"><br>
                
                <label class="form-label">Kode:</label><br>
                <input type="text" class="form-control" name="shelf_code" value="<?= $data['shelf_code'] ?>"><br>
                
                <label class="form-label">Jumlah:</label><br>
                <input type="number" class="form-control" name="amount" value="<?= $data['amount'] ?>"><br><br>

                <label class="form-label">Sinopsis:</label>
                <textarea class="form-control" name="synopsis"><?= $data['synopsis'] ?></textarea><br>

                <label class="form-label">Genre:</label>
                <input type="text" class="form-control" name="genre" value="<?= $data['genre'] ?>"><br>

                <label class="form-label">Tanggal Terbit:</label>
                <input type="date" class="form-control" name="publish" value="<?= $data['publish'] ?>"><br>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="shelf.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</body>