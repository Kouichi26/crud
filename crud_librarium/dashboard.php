<?php include 'header.php' ?>

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
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

        .card {
            background-color: rgba(255, 255, 255, 0.95);
            color: black;
        }   
    </style>
<body class="bg-light">
    <div class="container mt-5">

        <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
            <div class="text-center">
            <h1 class="display-4 fst-italic">Selamat Datang di Librarium</h1>
            <p class="lead my-3">Platform perpustakaan digital untuk menjelajahi koleksi buku, informasi akademik, dan layanan edukatif lainnya.</p>
            </div>

        </div>


        <!-- invitation -->
        <div class="jumbotron text-center rounded bg-primary text-white py-5">
            <h2 class="display-4">Jelajahi Database Kami!</h2>
            <p class="lead">Temukan berbagai macam buku dan informasi akademik di rak buku kami.</p>

            <a href="shelf.php" class="btn btn-light btn-lg">Kunjungi Rak Buku</a>
        </div>  
    </div>
    
    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php include 'footer.php' ?>