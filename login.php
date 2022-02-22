<?php

session_start();

if(isset($_SESSION['username'])) {
    header("Location: /");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tizimga kirish</title>
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/css/bootstrap.min.css">
</head>
<body class="bg-light">
    
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Tizimga kirish</h3>
                    <hr>
                    <form action="inc/login.inc.php" method="post" autocomplete="off">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Taxallus kiriting" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Parol kiriting" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-block">Kirish</button>
                    </form>
                    <hr>
                    <p>Siz avval ro'yxatdan o'tganmisiz? <a href="register" class="link">Ro'yxatdan o'tish</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/jquery.slim.min.js"></script>
<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>