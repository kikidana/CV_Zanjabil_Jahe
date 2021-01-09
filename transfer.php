<?php 
    include "component/sesi_start.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CV Zanjabil | Transfer</title>
        <?php  
            include "component/assets.php";
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <?php  
                include "component/header.php";
                include "config/database.php";
                $id_pesanan = $_GET['id_pesanan'];
            ?>
            <div class="row" style="margin-top: 6em; margin-bottom: 3em;">
                <?php 
                    if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 3) {

                    $data = mysqli_query($connection,"SELECT * FROM bank");
                    ?>
                    <div class="col-8">
                    <?php
                    while($bank = mysqli_fetch_array($data)){
                        ?>    
                            <div class="card mb-3">
                                <div class="card-body row">
                                    <div class="col-12">
                                        <div class="card w-75">
                                            <div class="card-body row">
                                                <div class="col-3">
                                                    <img src="https://images.bisnis-cdn.com/posts/2020/08/27/1283623/logojago-1-2.jpg" alt="Card image cap" class="img-thumbnail" />
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="card-title mt-3"><?php echo $bank["nama_bank"]; ?></h5>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check text-right">
                                                        <input data-nama="<?php echo $bank["nama_bank"]; ?>" data-rek="<?php echo $bank["no_rek"]; ?>" class="form-check-input mt-4" type="radio" name="id_bank" value="<?php echo $bank["id_bank"]; ?>" style="transform: scale(3);" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
                    </div>
                        <div class="col-4">
                                <div class="card" id="upload_bukti">
                                    <div class="card-body">
                                        <h5 class="card-title mt-3" id="nama_bank"></h5>
                                        <h5 class="card-title mt-5 text-center" id="rek_bank"></h5>
                                        <form method="post" action="config/upload_bukti.php" enctype="multipart/form-data">
                                            <div class="input-group mb-3 mt-5">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="bukti_transfer" />
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div>
                                            <input type="hidden" name="bank_id" id="bank_id">
                                            <input type="hidden" name="id_pesanan" value="<?php echo $id_pesanan; ?>">
                                            <div class="text-right mt-3">
                                                <button class="btn btn-success" type="submit">Submit</button>
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
                include "component/footer.php";
            ?>
        </div>
        <script type="text/javascript">
            $('#upload_bukti').hide();
            $('input[type=radio][name=id_bank]').change(function() {
                $('#bank_id').val($('input[type=radio][name=id_bank]:checked').val());
                $('#nama_bank').text($('input[type=radio][name=id_bank]:checked').data('nama'));
                $('#rek_bank').text($('input[type=radio][name=id_bank]:checked').data('rek'));   
                $('#upload_bukti').show();
            });
        </script>
    </body>
</html>
