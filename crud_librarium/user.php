<?php 
include 'header.php';

$key = isset($_GET['key']) ? mysqli_real_escape_string($conn, $_GET['key']) : '';
if (!empty($key)) {
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE name LIKE '%$key%' OR username LIKE '%$key%' OR level LIKE '%$key%'");
} else {
    $query = mysqli_query($conn, "SELECT * FROM tb_user");
}
?>
<head>
    <meta charset="UTF-8">
    <title>Manajemen Pengguna</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/background.jpg') no-repeat center center fixed;
            height: 100vh;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4">
            <h2 class="mb-4 text-center">Manajemen Pengguna</h2>

            <!-- search bar -->
            <form method="GET" action="">
                <div class="input-group mb-3">
                    <input type="text" name="key" class="form-control" placeholder="Filter Pencarian" value="<?= htmlspecialchars($key) ?>">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>

            <table class="table table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Dibuat</th>
                        <th>Diperbarui</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($u = mysqli_fetch_assoc($query)):
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $u['name'] ?></td>
                            <td><?= $u['username'] ?></td>
                            <td><?= $u['level'] ?></td>
                            <td><?= $u['created_at'] ?></td>
                            <td><?= $u['updated_at'] ?></td>
                            <td>
                                <?php if ($_SESSION['ulevel'] == 'Admin'): ?>
                                    <a href="user_edit.php?id=<?= $u['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="user_delete.php?id=<?= $u['id'] ?>" class="btn btn-danger btn-sm" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pengguna ini?')">Hapus</a>
                                <?php else: ?>
                                    <span class="text-muted">Akses dibatasi</span>
                                <?php endif; ?>
                            </td>

                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

<?php include 'footer.php'; ?>
