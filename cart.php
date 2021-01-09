<?php 
    include "component/sesi_start.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CV Zanjabil | Cart</title>
        <?php  
            include "component/assets.php";
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <?php  
                include "component/header.php";
            ?>
            <form method="POST" action="config/add_order.php">
                <div class="row" style="margin-top: 6em; margin-bottom: 3em;">
                    <?php 
                        include 'config/database.php';
                        $user_id = $_SESSION['user_id'];
                        $data = mysqli_query($connection,"SELECT * FROM cart JOIN barang ON cart.barang = barang.id_barang WHERE pelanggan = '$user_id'");
                        while($cart = mysqli_fetch_array($data)){
                            ?>
                                <div class="col-12">
                                    <input type="hidden" name="id_barang[]" value="<?php echo $cart["barang"]; ?>">
                                    <input type="hidden" name="qty[]" value="<?php echo $cart["qty"]; ?>">
                                    <div class="card">
                                        <div class="card-body row">
                                            <div class="col-2">
                                                <img src="<?php echo 'img/barang/'.$cart["gambar_barang"]; ?>" alt="Card image cap" class="img-thumbnail" />
                                            </div>
                                            <div class="col-4">
                                                <h5 class="card-title mt-5"><?php echo $cart["nama_barang"]; ?></h5>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="card-title mt-5"><?php echo $cart["qty"]; ?> Kg</h5>
                                            </div>
                                            <div class="col-2">
                                                <a href="config/delete_cart.php?id_barang=<?php echo $cart['barang']?>"><button type="button" class="btn btn-danger mt-5">Hapus</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                </div>
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-lg text-right">Order</button>
                    </div>
                </div>
            </form>
            <?php  
                include "component/footer.php";
            ?>
        </div>
    </body>
</html>
