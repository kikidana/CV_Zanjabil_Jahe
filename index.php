<?php 
    include "component/sesi_start.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CV Zanjabil</title>
        <?php  
            include "component/assets.php";
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <?php  
                include "component/header.php";
            ?>
            <div class="container">
                <div class="row" style="margin-top: 6em; margin-bottom: 3em;">
                    <?php 
                        if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 2) {
                            include "component/cs.php";
                        }else{
                            include "component/pelanggan.php";
                        }
                    ?>
                </div>
            </div>
            <?php  
                include "component/footer.php";
            ?>
        </div>
    </body>
</html>
