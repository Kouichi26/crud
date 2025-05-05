<?php
include 'header.php';
$id = $_GET['id'] ?? null;

if ($id) {
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '$id'");
    $data = mysqli_fetch_assoc($query);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $level = mysqli_real_escape_string($conn, $_POST['level']);

        $update = mysqli_query($conn, "UPDATE tb_user SET name='$name', username='$username', level='$level', updated_at=NOW() WHERE id='$id'");

        if ($update) {
            header("Location: user.php?msg=Berhasil diubah");
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
        <h2 class="mb-4 text-center">Edit Pengguna</h2>
        <form method="POST">
            <label class="form-label">Nama:</label>
            <input type="text" class="form-control" name="name" value="<?= $data['name'] ?>" required><br>

            <label class="form-label">Username:</label>
            <input type="text" class="form-control" name="username" value="<?= $data['username'] ?>" required><br>

            <label class="form-label">Level:</label>
            <select name="level" class="form-control" required>
                <option value="Admin" <?= $data['level'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                <option value="Moderator" <?= $data['level'] == 'Moderator' ? 'selected' : '' ?>>Moderator</option>
                <option value="Moderator" <?= $data['level'] == 'Visitor' ? 'selected' : '' ?>>Visitor</option>
            </select><br>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="user.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
</body>
