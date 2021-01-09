<?php 
    include "component/sesi_start.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CV Zanjabil | List Pesanan</title>
        <?php  
            include "component/assets.php";
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <?php  
                include "component/header.php";
                include 'config/database.php';

                $data = mysqli_query($connection,"SELECT * FROM pesanan JOIN user ON pesanan.user_id = user.user_id ");

                while($list_pesanan = mysqli_fetch_array($data)){
                    ?>
                        <div class="row" style="margin-top: 6em; margin-bottom: 3em;">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body row">
                                        <div class="col-3 text-center">
                                            <h5 class="card-title mt-3"><?php echo $list_pesanan["tanggal_pesanan"]; ?></h5>
                                        </div>
                                        <div class="col-3 text-center">
                                            <h5 class="card-title mt-3"><?php echo $list_pesanan["nama"]; ?> / <?php echo $list_pesanan["user_id"]; ?></h5>
                                        </div>
                                        <div class="col-3 text-center">
                                            <h5 class="card-title mt-3"><?php echo $list_pesanan["status"]; ?></h5>
                                        </div>
                                        <div class="col-3">
                                            <a href="detail_pesanan_admin.php?id_pesanan=<?php echo $list_pesanan['id_pesanan'] ?>"><button class="btn mt-2 btn-primary">Lihat Pesanan</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            ?>
            <?php  
                include "component/footer.php";
            ?>
        </div>
    </body>
</html>
