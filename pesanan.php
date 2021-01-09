<?php 
    include "component/sesi_start.php";
    if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1) {
        header("location:list_pesanan.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CV Zanjabil | Pesanan</title>
        <?php  
            include "component/assets.php";
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <?php  
                include "component/header.php";
                include 'config/database.php';
                $user_id = $_SESSION['user_id'];
                $data = mysqli_query($connection,"SELECT pesanan.id_pesanan, pesanan.status, pesanan.tanggal_pesanan, SUM(barang_pesanan.qty*barang.harga_barang) AS total_harga FROM pesanan JOIN barang_pesanan ON pesanan.id_pesanan = barang_pesanan.id_pesanan JOIN barang ON barang.id_barang = barang_pesanan.id_barang WHERE user_id = '$user_id' GROUP BY pesanan.id_pesanan");

                while($pesanan = mysqli_fetch_array($data)){
                    ?>
                        <div class="row" style="margin-top: 6em; margin-bottom: 3em;">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body row">
                                        <div class="col-3">
                                            <h5 class="card-title mt-4"><?php echo $pesanan["tanggal_pesanan"]; ?></h5>
                                        </div>
                                        <div class="col-3">
                                            <h5 class="card-title mt-4"><?php echo $pesanan["total_harga"]; ?> Rp</h5>
                                        </div>
                                        <div class="col-2">
                                            <a href="transfer.php?id_pesanan=<?php echo $pesanan ['id_pesanan'] ?>"><button type="button" class="btn mt-2"><i class="fas fa-upload"></i></button></a>
                                        </div>
                                        <div class="col-2">
                                            <h5 class="card-title mt-3"><?php echo $pesanan["status"]; ?></h5>
                                        </div>
                                        <div class="col-2">
                                            <a href="detail_pesanan.php?id_pesanan=<?php echo $pesanan ['id_pesanan'] ?>"><button class="btn mt-2 btn-primary">Lihat Pesanan</button></a>
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
