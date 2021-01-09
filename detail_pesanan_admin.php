<?php 
    include "component/sesi_start.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CV Zanjabil | Detail Pesanan (Admin)</title>
        <?php  
            include "component/assets.php";
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <?php  
                include "component/header.php";
                include 'config/database.php';
                    $id_pesanan = $_GET['id_pesanan'];
                    $data = mysqli_query($connection,"SELECT *, SUM(barang_pesanan.qty*barang.harga_barang) AS total_harga FROM barang_pesanan JOIN barang ON barang_pesanan.id_barang = barang.id_barang JOIN pesanan ON pesanan.id_pesanan = barang_pesanan.id_pesanan JOIN pembayaran ON pembayaran.id_pesanan = pesanan.id_pesanan JOIN user ON pesanan.user_id = user.user_id WHERE barang_pesanan.id_pesanan = '$id_pesanan' GROUP BY barang.id_barang");
                    ?>
                    <form method="post" action="config/update_status.php">
                        <input type="hidden" name="id_pesanan" value="<?php echo $id_pesanan ?>" />
                    <?php
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
                                        <h5 class="card-title text-left my-4">Status </h5>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="card-title text-left my-4">:</h5>
                                    </div>
                                    <div class="col-4"></div>
                                    <div class="col-6">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="status" value="on_progress" <?php echo ($detail_pesanan['status'] == 'on_progress') ? 'checked' : ''; ?> >
                                          <label class="form-check-label" for="exampleRadios1">
                                            On Progress
                                          </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="status" value="on_delivery" <?php echo ($detail_pesanan['status'] == 'on_delivery') ? 'checked' : ''; ?>>
                                          <label class="form-check-label" for="exampleRadios2">
                                            On Delivery
                                          </label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="card-title text-left my-4">Bukti Transfer</h5>
                                    </div>
                                    <div class="col-8">
                                        <h5 class="card-title text-left my-4">:</h5>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-left">
                                            <img src="<?php echo 'img/bukti/'.$detail_pesanan['user_id'].'/'.$detail_pesanan["bukti_transfer"]; ?>" alt="Card image cap" class="img-thumbnail my-4" />
                                        </div>
                                    </div>
                                    <div class="col-12 text-right">
                                        <button class="btn btn-primary" type="submit">Update</button>
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
            </form>
            <?php  
                include "component/footer.php";
            ?>
        </div>
    </body>
</html>
