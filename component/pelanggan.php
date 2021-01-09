<?php 
    if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1) {
        include "admin.php";
    }
?>
<?php
    include 'config/database.php';
    $data = mysqli_query($connection,"SELECT * FROM barang");
    
    while($barang = mysqli_fetch_array($data)){ 
        ?>
            <div class="col-3">
                <div class="card mt-3">
                    <img class="card-img-top" src="<?php echo 'img/barang/'.$barang["gambar_barang"]; ?>" alt="Card image cap" />
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $barang["nama_barang"]; ?></h5>
                        <p class="card-text"><?php echo $barang["deskripsi_barang"]; ?></p>
                        <a href="item.php?id_barang=<?php echo $barang["id_barang"]; ?>" class="btn btn-sm btn-primary">Detail</a>
                        <?php  
                            if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1) {
                                ?>
                                <a href="edit_item.php?id_barang=<?php echo $barang["id_barang"]; ?>" class="btn btn-sm btn-warning">Ubah</a>
                                <a href="config/delete_item.php?id_barang=<?php echo $barang["id_barang"]; ?>" class="btn btn-sm btn-danger">Hapus</a>
                                <?php
                            }
                        ?>                                        
                    </div>
                </div>
            </div>
        <?php
    } 
?>
            
