
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
                            <a href="login.php" class="active">Login</a><a href="register.php">Register</a>
                        </div>
                        <form id="loginform">
                            <input class="form-control" type="text" id='username' name="username" placeholder="E-mail Address" required>
                            <p class='usernamemessage'></p>
                            <input class="form-control" id='password' type="password" name="password" placeholder="Password" required>
                            <p class='passwordmessage'></p>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button> <a href="forget9.html">Forget password?</a>
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