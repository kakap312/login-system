
<!DOCTYPE html>
<html lang="en"> 
<head>
<?php require_once(dirname(__FILE__).'/../../../core/presentation/ui/resources/include/header.php'); ?>
<title>Login</title>
</head>
<body>
<div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3>Get more things done with Loggin platform.</h3>
                    <p>Access to the most powerfull tool in the entire design and web industry.</p>
                    <img src="resources/img/graphic5.svg" alt="">
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
                            <a href="login.php">Login</a><a href="register.php" class="active">Register</a>
                        </div>
                        <form id="registerForm">
                            <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                            <input class="form-control" type="text" name="username" placeholder="Username" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once(dirname(__FILE__).'/../../../core/presentation/ui/resources/include/footer.php'); ?>
    <script src="resources/js/accountjs.js"></script>
</body>
</html>