
<!DOCTYPE html>
<html lang="en"> 
<head>
<?php require_once(dirname(__FILE__).'/../../../core/presentation/ui/include/header.php'); ?>
<link rel="stylesheet" type="text/css" href="../../../resources/css/accountstyle.css">
<title>account</title>
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3>Get more things done with Loggin platform.</h3>
                    <p>Access to the most powerfull tool in the entire design and web industry.</p>
                    <img src="../../../resources/img/graphic5.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside">
                            <a href="index.html">
                                <div class="logo">
                                    <img class="logo-size" src="resources/img/logo-light.svg" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="page-links">
                            <a id='loginlink' href="#" class="active">Login</a><a id='registerlink' href='#'>Register</a>
                        </div>
                        <?php require_once(dirname(__FILE__).'/login.php'); ?>
                        <?php require_once(dirname(__FILE__).'/register.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once(dirname(__FILE__).'/../../../core/presentation/ui/include/footer.php'); ?>
    <script src="../../../resources/js/accountjs.js"></script>
</body>
</html>