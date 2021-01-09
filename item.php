<?php 
    include "component/sesi_start.php";
    if (!isset($_SESSION['user_id'])) {
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CV Zanjabil | item</title>
        <?php  
            include "component/assets.php";
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <?php  
                include "component/header.php";
                include 'config/database.php';

                if (isset($_GET["id_barang"]) && ($_GET["id_barang"] != "") && ($_GET["id_barang"] > 0)) {
                    
                    $id_barang = $_GET["id_barang"];
                    $data = mysqli_query($connection,"SELECT * FROM barang WHERE id_barang='$id_barang'");

                    if (mysqli_num_rows($data) > 0) {
                        $barang = mysqli_fetch_array($data);
                        ?>
                        <div class="row" style="margin-top: 6em; margin-bottom: 3em;">
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-body row">
                                        <input type="hidden" id="max_stock" value="<?php echo $barang["jumlah_barang"]; ?>">
                                        <div class="col-4">
                                            <img src="<?php echo 'img/barang/'.$barang["gambar_barang"]; ?>" alt="Card image cap" class="img-thumbnail" />
                                            <h5 class="card-title mt-3"><?php echo $barang["nama_barang"]; ?></h5>
                                            <h5 class="card-title mt-3">Harga : <?php echo $barang["harga_barang"]; ?> Rp/Kg</h5>
                                            <h5 class="card-title mt-3">Stock : <?php echo $barang["jumlah_barang"]; ?> Kg</h5>
                                        </div>
                                        <div class="col-1" style="border-left: 1px solid #333;"></div>
                                        <div class="col-7">
                                            <p>
                                                <?php echo $barang["deskripsi_barang"]; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                if (isset($_SESSION['role_id']) && $_SESSION['role_id'] != 1) {
                                    ?>
                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <form method="post" class="row" action="config/addto_cart.php">
                                                    <input type="hidden" name="id_barang" value="<?php echo $id_barang ?>" />
                                                    <div class="col-8">
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control" id="count_barang" name="count_barang" readonly style="background-color: white;" />
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">Kg</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <button type="button" class="btn mx-1" onclick="tambah_qty()"><i class="fas fa-plus"></i></button>
                                                        <button type="button" class="btn mx-1" onclick="kurang_qty()"><i class="fas fa-minus"></i></button>
                                                    </div>
                                                    <div class="col-12 text-right">
                                                        <button type="submit" class="btn btn-primary my-3">Add To Cart <i class="fas fa-cart-plus"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>
                        <?php
                    }
                }
            ?>           
            <?php  
                include "component/footer.php";
            ?>
        </div>
        <script type="text/javascript">
            $('#count_barang').val(1);
            var max_stock = parseInt($('#max_stock').val()); 

            function tambah_qty(){
                var qty = $('#count_barang').val();    
                if (qty < max_stock) {
                    $('#count_barang').val(++qty);
                }                
            }

            function kurang_qty(){
                var qty = $('#count_barang').val();
                if (qty > 1) {
                    $('#count_barang').val(--qty);   
                }
            }
        </script>
    </body>
</html>
