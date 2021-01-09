<?php 
    include "component/sesi_start.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CV Zanjabil | Ubah Item</title>
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
                        <div class="container">
                            <div class="row" style="margin-top: 8em; margin-bottom: 3em;">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <?php 
                                        if (isset($_GET['pesan'])) {
                                            if ($_GET['pesan'] == "gagal_itemtersedia") {
                                            ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong>Item sudah tersedia</strong> data item sudah tersedia
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php            
                                            }
                                        }
                                    ?>
                                    <div class="card bg-light mb-3" style="max-width: 110rem;">
                                        <div class="card-header"><h5>Ubah Item</h5></div>
                                        <div class="card-body">
                                            <form method="post" action="config/edit_item.php" enctype="multipart/form-data">
                                                <input type="hidden" name="id_barang" value="<?php echo $id_barang ?>" />
                                                <div class="form-group">
                                                    <label for="nama_label">Nama Item</label>
                                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $barang['nama_barang'] ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="harga_label">Harga Item</label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="harga_barang" name="harga_barang" value="<?php echo $barang['harga_barang'] ?>"/>
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Rp</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="harga_label">Stock Item</label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?php echo $barang['jumlah_barang'] ?>"/>
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Kg</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi_label">Deskripsi Item</label>
                                                    <textarea class="form-control" id="deskripsi_barang" name="deskripsi_barang" rows="3"><?php echo $barang['deskripsi_barang'] ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_label">Gambar Item</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="gambar_barang" name="gambar_barang" />
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                    </div>
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
                    <?php
                    }
                }
            ?>
                        
            <?php  
                include "component/footer.php";
            ?>
        </div>
    </body>
</html>
