<header>
    <nav class="navbar navbar-light fixed-top" style="background-color: #12dec3;">
        <a class="navbar-brand" href="#">CV Zanjabil</a>
        <?php
            if ((isset($_SESSION['role_id']) && $_SESSION['role_id'] != 2) || (!isset($_SESSION['role_id']))) {
                ?>
                <a class="nav-link" href="index.php">Product</a>
                <a class="nav-link" href="pesanan.php">Pesanan</a>
                <?php
                    if ((isset($_SESSION['role_id']) && $_SESSION['role_id'] != 1) || (!isset($_SESSION['role_id']))) {
                        ?>
                        <a class="nav-link" href="about_us.php">About Us</a>
                        <?php
                    } 
            }
        ?>
                
        <div class="ml-md-auto d-none d-md-flex">
            <?php
                if (!isset($_SESSION['user_id'])) {
                    ?>
                        <a href="register.php"><button class="btn btn-outline-success btn-sm my-2 my-sm-0 mx-2" type="submit">Register</button></a>
                        <a href="login.php"><button class="btn btn-outline-success btn-sm my-2 my-sm-0 mx-2" type="submit">Log In</button></a>
                    <?php
                }else{
                    ?>
            <a href="config/logout.php"><button class="btn btn-outline-success btn-sm my-2 my-sm-0 mx-2" type="submit">Log Out</button></a>
            <?php
                echo $_SESSION['nama'];
                }
            ?>
        </div>
    </nav>
</header>