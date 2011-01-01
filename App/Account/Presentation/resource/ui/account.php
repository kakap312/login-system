
<!DOCTYPE html>
<html lang="en"> 
<head>
<?php
require_once(dirname(__DIR__,4).'/core/presentation/resource/ui/include/header.php'); 
?>
<title>account</title>
<script type="text/javascript">
</script>
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3>Get more things done with our PMS</h3>
                    <p>Access to the most powerfull tool to manage your pharmacy shop</p>
                    <img src="../img/graphic5.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside">
                            <a href="index.html">
                                <div class="logo">
                                    <img class="logo-size" src="../img/logo-light.svg" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="page-links">
                            <a id='loginlink' href="#" class="active">Login</a>
                            <!--<a id='registerlink' href='#'>Register</a>-->
                        </div>
                        <?php 
                        require_once(dirname(__FILE__).'/login.php');
                        //require_once(dirname(__FILE__).'/register.php'); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    require_once(dirname(__DIR__,4).'/core/presentation/resource/ui/include/footer.php'); 
    ?>
    <script src="../js/accountjs.js"></script>
</body>
</html>