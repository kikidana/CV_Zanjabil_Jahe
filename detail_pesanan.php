<?php 
    include "component/sesi_start.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CV Zanjabil | Detail Pesanan</title>
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
                    $id_pesanan = $_GET['id_pesanan'];
                    $data = mysqli_query($connection,"SELECT *, SUM(barang_pesanan.qty*barang.harga_barang) AS total_harga FROM barang_pesanan JOIN barang ON barang_pesanan.id_barang = barang.id_barang JOIN pesanan ON pesanan.id_pesanan = barang_pesanan.id_pesanan JOIN pembayaran ON pembayaran.id_pesanan = pesanan.id_pesanan WHERE barang_pesanan.id_pesanan = '$id_pesanan' AND pesanan.user_id = '$user_id' GROUP BY barang.id_barang");
                    while($detail_pesanan = mysqli_fetch_array($data)){
                        ?>
                        <div class="container">
                            <div class="card text-center" style="margin-top: 6em; margin-bottom: 3em;">
                                <div class="card-header">
                                    Detail Pesanan
                                </div>
                                <div class="card-body row">
                                    <div class="col-4">
                                        <h5 class="card-title text-left my-4">Barang </h5>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="card-title text-left my-4">:</h5>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="card-title text-left my-4"><?php echo $detail_pesanan["nama_barang"]; ?></h5>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="card-title text-left my-4">Jumlah </h5>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="card-title text-left my-4">:</h5>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="card-title text-left my-4"><?php echo $detail_pesanan["qty"]; ?></h5>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="card-title text-left my-4">Harga </h5>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="card-title text-left my-4">:</h5>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="card-title text-left my-4"><?php echo $detail_pesanan["total_harga"]; ?> Rp</h5>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="card-title text-left my-4">Bukti Transfer</h5>
                                    </div>
                                    <div class="col-8">
                                        <h5 class="card-title text-left my-4">:</h5>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-left">
                                            <img src="<?php echo 'img/bukti/'.$user_id.'/'.$detail_pesanan["bukti_transfer"]; ?>" alt="Card image cap" class="img-thumbnail my-4" />
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    CV Zanjabil
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
