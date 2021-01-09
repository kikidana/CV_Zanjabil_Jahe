<?php 
    include "component/sesi_start.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CV Zanjabil | Register</title>
        <?php  
            include "component/assets.php";
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <header>
                <nav class="navbar navbar-light fixed-top" style="background-color: #12dec3;">
                    <a class="navbar-brand" href="#">CV Zanjabil</a>
                    <a class="navbar-brand ml-md-auto d-none d-md-flex" href="#">Register</a>
                </nav>
            </header>
            <div class="container">
                <div class="row" style="margin-top: 8em; margin-bottom: 3em;">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="card bg-light mb-3" style="max-width: 110rem;">
                            <div class="card-header"><h5>Register</h5></div>
                            <div class="card-body">
                                <form method="post" action="config/add_akun.php">    
                                    <div class="form-group">
                                        <label for="nama_label">Nama</label>
                                        <input type="text" class="form-control" name="nama"  placeholder="Masukan Nama" />
                                    </div>
                                    <div class="form-group">
                                        <label for="email_label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Masukan Email" />
                                    </div>
                                    <div class="form-group">
                                        <label for="password_label">password</label>
                                        <input type="text" class="form-control" name="password" placeholder="Masukan Password" />
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telp_label">No. Telp</label>
                                        <input type="text" class="form-control" name="no_telp" placeholder="Masukan No.telp" />
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_label">Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="3"></textarea>
                                    </div>
                                    <a href="index.php"><button type="button" class="btn btn-danger">Back</button></a>
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
