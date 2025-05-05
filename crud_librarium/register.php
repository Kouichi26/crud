<?php
    include 'connection.php'; 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Halaman Register</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h4 class="mb-0">Register</h4>
                    </div>
                    <div class="card-body">

                        <?php
                            if(isset($_GET['msg'])){
                                echo "<div class='alert alert-danger'>".$_GET['msg']."</div>";
                            }
                        ?>

                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama yang Ditampilkan</label>
                                <input type="text" name="name" id="name" placeholder="Nama Display" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="user" id="username" placeholder="Username" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="pass" id="password" placeholder="Password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="level" class="form-label">Level</label>
                                <select name="level" id="level" class="form-select" required>
                                    <option value="">-- Pilih Level --</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Moderator">Moderator</option>
                                    <option value="Visitor">Visitor</option>
                                </select>
                            </div>

                            <div class="d-grid">
                                <input type="submit" name="submit" value="Register" class="btn btn-primary">
                            </div>
                        </form>

                        <?php
                        if(isset($_POST['submit'])){
                            $name = mysqli_real_escape_string($conn, $_POST['name']);
                            $user = mysqli_real_escape_string($conn, $_POST['user']);
                            $pass = mysqli_real_escape_string($conn, $_POST['pass']);
                            $level = mysqli_real_escape_string($conn, $_POST['level']);
                            $now = date('Y-m-d H:i:s');

                            $cek = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '".$user."' ");
                            if(mysqli_num_rows($cek) > 0){
                                echo '<div class="alert alert-danger mt-3">Username sudah digunakan</div>';
                            } else {
                                $insert = mysqli_query($conn, "INSERT INTO tb_user (name, username, pass, level, created_at, updated_at) VALUES (
                                    '$name',
                                    '$user',
                                    '".md5($pass)."',
                                    '$level',
                                    '$now',
                                    '$now'
                                )");

                                if($insert){
                                    echo "<script>window.location = 'login.php?msg=Registrasi berhasil, silakan login'</script>";
                                } else {
                                    echo '<div class="alert alert-danger mt-3">Gagal mendaftar, silakan coba lagi</div>';
                                }
                            }
                        }
                        ?>

                    </div>
                    <div class="card-footer text-center">
                        <a href="login.php" class="text-decoration-none">Sudah punya akun? Login disini.</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
