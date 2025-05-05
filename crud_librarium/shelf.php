<?php 
include 'header.php';
$query = mysqli_query($conn, "SELECT * FROM tb_shelf");

$key = isset($_GET['key']) ? mysqli_real_escape_string($conn, $_GET['key']) : '';
if (!empty($key)) {
    $query = mysqli_query($conn, "SELECT * FROM tb_shelf WHERE nama LIKE '%$key%' OR shelf_code LIKE '%$key%' OR description LIKE '%$key%'");
} else {
    $query = mysqli_query($conn, "SELECT * FROM tb_shelf");
}
?>
?>
<head>
    <meta charset="UTF-8">
    <title>Manajemen Rak</title>
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
            <h2 class="mb-4 text-center">Manajemen Rak</h2>
            <?php if ($_SESSION['ulevel'] == 'Admin' || $_SESSION['ulevel'] == 'Moderator'): ?>
            <a href="shelf_add.php" class="btn btn-primary mb-3">Tambah Buku</a>
            <?php endif; ?>
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
                        <th>Pencipta / Penerbit</th>
                        <th>Kode Rak</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($r = mysqli_fetch_assoc($query)):
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $r['nama'] ?></td>
                            <td><?= $r['author'] ?></td>
                            <td><?= $r['shelf_code'] ?></td> 
                            <td><?= $r['description'] ?></td>
                            <td>
                            <img src="images/<?= $r['image'] ?>" alt="#" width="80">
                            </td>
                            <td><?= $r['amount'] ?></td>
                            <td>
                                <?php if ($_SESSION['ulevel'] == 'Admin' || $_SESSION['ulevel'] == 'Moderator'): ?>
                                    <a href="shelf_edit.php?id=<?= $r['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="shelf_delete.php?id=<?= $r['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                                <?php endif; ?>

                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#gambarModal<?= $r['id'] ?>">
                                    Detail Buku
                                </button>
                            </td>
                        </tr>

                        <!-- modal -->
                        <div class="modal fade" id="gambarModal<?= $r['id'] ?>" tabindex="-1" aria-labelledby="gambarModalLabel<?= $r['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="gambarModalLabel<?= $r['id'] ?>">Detail Buku</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-5 text-center">
                                                <img src="images/<?= $r['image'] ?>" alt="Cover" class="img-fluid rounded shadow-sm mb-3">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card border-0 shadow-sm">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?= $r['nama'] ?></h5>
                                                        <p class="card-text mb-1"><strong>Pencipta/Penerbit:</strong> <?= $r['author'] ?></p>
                                                        <p class="card-text mb-1"><strong>Kode Rak:</strong> <?= $r['shelf_code'] ?></p>
                                                        <p class="card-text mb-1"><strong>Jumlah:</strong> <?= $r['amount'] ?></p>
                                                        <p class="card-text mb-1"><strong>Deskripsi:</strong><br><?= nl2br(htmlspecialchars($r['description'])) ?></p>
                                                        <p class="card-text mb-1"><strong>Sinopsis:</strong><br><?= nl2br(htmlspecialchars($r['synopsis'])) ?></p>
                                                        <p class="card-text mb-1"><strong>Genre:</strong> <?= htmlspecialchars($r['genre']) ?></p>
                                                        <p class="card-text"><strong>Tanggal Terbit:</strong> <?= !empty($r['publish']) ? date('d/m/Y', strtotime($r['publish'])) : '-' ?></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

<?php include 'footer.php' ?>
