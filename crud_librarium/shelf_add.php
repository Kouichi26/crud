<?php include 'header.php' ?>

<head>
    <meta charset="UTF-8">
    <title>Tambah Rak</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4">
            <h2 class="mb-4 text-center">Penambahan Data  </h2>
            <form action="shelf_add_process.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="shelf_code" class="form-label">Kode</label>
                    <input type="text" class="form-control" id="shelf_code" name="shelf_code" required placeholder="A9, 2B, 9S, dll">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Nama Buku">
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Publisher / Author</label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="Nama">
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="amount" name="amount" value="0" min="0">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="synopsis" class="form-label">Sinopsis</label>
                    <textarea class="form-control" id="synopsis" name="synopsis" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <input type="text" class="form-control" id="genre" name="genre" placeholder="Genre Buku">
                </div>
                <div class="mb-3">
                    <label for="pub_date" class="form-label">Tanggal Terbit</label>
                    <input type="date" class="form-control" id="publish" name="publish">
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="shelf.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

<?php include 'footer.php' ?>
