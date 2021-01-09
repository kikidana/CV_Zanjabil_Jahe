<?php 
    include "component/sesi_start.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CV Zanjabil | Login</title>
        <?php  
            include "component/assets.php";
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <header>
                <nav class="navbar navbar-light fixed-top" style="background-color: #12dec3;">
                    <a class="navbar-brand" href="#">CV Zanjabil</a>
                    <a class="navbar-brand ml-md-auto d-none d-md-flex" href="#">Login</a>
                </nav>
            </header>
            <div class="container">
                <div class="text-center fixed-top" style="margin-top: 5em; margin-bottom: 3em;">
                <?php 
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "gagal"){
                            ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Password dan Email SALAH!</strong> silahkan masukan email dan password anda kembali dengan benar.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php       
                        }else if($_GET['pesan'] == "logout"){
                            echo "Anda telah berhasil logout";
                        }else if($_GET['pesan'] == "belum_login"){
                            echo "Anda harus login untuk mengakses halaman admin";
                        }elseif ($_GET['pesan'] == "gagal_email") {
                            ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Email SALAH!</strong> silahkan masukan email anda kembali dengan benar.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                        }elseif ($_GET['pesan'] == "gagal_pw") {
                            ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Password SALAH!</strong> silahkan masukan pasword anda kembali dengan benar.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                        }
                    }
                ?>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="card bg-light mb-3" style="margin-top: 10em; margin-bottom: 3em; max-width: 110rem;">
                            <div class="card-header"><h5>Login</h5></div>
                            <div class="card-body">
                                <form method="post" action="config/login.php">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter email" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password" />
                                    </div>
                                    <a href="index.php"><button type="button" class="btn btn-danger">Back</button></a>
                                    <a href="register.php"><button type="button" class="btn btn-secondary">Register</button></a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
            <footer class="fixed-bottom text-center mt-3" style="background-color: #12dec3;">
                Author: Kelompok Jahe
            </footer>
        </div>
    </body>
</html>
