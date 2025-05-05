<?php 
    include 'connection.php'; // Pastikan koneksi database disertakan
    session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Halaman Login</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	</head>

	<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <!-- Card Login -->
                <div class="card shadow-sm">
                    
                    <!-- Card Header -->
                    <div class="card-header text-center">
                        <h4 class="mb-0">Login</h4>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">

                        <?php
                            if(isset($_GET['msg'])){
                                echo "<div class='alert alert-danger'>".$_GET['msg']."</div>";
                            }
                        ?>

                        <!-- Form Login -->
                        <form action="" method="POST">
                            
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="user" id="username" placeholder="Username" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="pass" id="password" placeholder="Password" class="form-control">
                            </div>

                            <div class="d-grid">
                                <input type="submit" name="submit" value="Login" class="btn btn-primary">
                            </div>

                        </form>

                        <?php
                            if(isset($_POST['submit'])){
                                $user = mysqli_real_escape_string($conn, $_POST['user']);
                                $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                                $cek = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '".$user."' ");
                                if(mysqli_num_rows($cek) > 0){
                                    $d = mysqli_fetch_object($cek);
                                    if(md5($pass) == $d->pass){
                                        $_SESSION['status_login'] = true;
                                        $_SESSION['uid'] = $d->id;
                                        $_SESSION['uname'] = $d->name;
                                        $_SESSION['ulevel'] = $d->level;

                                        echo "<script>window.location = 'dashboard.php'</script>";
                                    } else {
                                        echo '<div class="alert alert-danger mt-3">Password salah</div>';
                                    }
                                } else {
                                    echo '<div class="alert alert-danger mt-3">Username tidak ditemukan</div>';
                                }
                            }
                        ?>

                    </div>

                    <!-- Card Footer -->
                    <div class="card-footer text-center">
                        <a href="register.php" class="text-decoration-none">Belum punya akun? Daftar terlebih dahulu.</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

</body>

</html>