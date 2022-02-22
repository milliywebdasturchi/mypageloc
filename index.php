<?php

include "db_config.php";

session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bosh sahifa</title>
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/font-awesome/css/font-awesome.min.css">
</head>
<body class="bg-light">
    
<div class="container">
    <div class="row mt-3">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">Mening profilm</div>
                <div class="card-body text-center">
                    <p><i class="fa fa-user fa-5x"></i></p>
                    <h5>Salom, <?php echo $_SESSION['username']; ?></h5>
                    <p><a href="logout" class="btn btn-warning btn-sm"><i class="fa fa-sign-out"></i> Chiqish</a></p>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <h6><i class="fa fa-pencil"></i> Maqola yozish</h6>
                    <hr>
                    <form action="inc/addpost.php" method="post">
                        <div class="form-group">
                            <textarea name="content" cols="30" rows="5" class="form-control" placeholder="Maqola matnini kiriting..." required></textarea>
                        </div>
                        <input type="hidden" name="userId" value="<?php echo $_SESSION['id']; ?>">
                        <button type="submit" name="addpost" class="btn btn-primary btn-sm" style="float: right;"><i class="fa fa-save"></i> Saqlash</button>
                    </form>
                </div>
            </div>
            <hr>
                <?php 
                    $result = $conn->query("SELECT * FROM posts WHERE user_id = '$_SESSION[id]' ORDER BY id DESC");                        
                    while ($row = $result->fetch_assoc()) {
                        $second = time() - $row['createdAt'];
                        $minut = intval($second / 60);
                        $hours = intval($second / 3600);
                        $day = intval($second / 86400);
                        $week = intval($second / 604800);
                        $month = intval($second / 2419200);
                        // minut ago
                        if($minut < 1) {
                            $date = "<span class='badge badge-success'>yangi</span>";
                        } else if($hours >= 3600 and $hours < 86400) {
                            $date = $hours . " soat oldin";
                        }else if($day >= 86400 and $day < 604800) {
                            $date = $day . " kun oldin";
                        }else if($week >= 604800 and $week < 2419200) {
                            $date = $week . " hafta oldin";
                        } else if($month >= 2419200) {
                            $date = date("F j, Y", $row['createdAt']);
                        } else {
                            $date = $minut . " daqiqa oldin";
                        }
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <?php echo $row['content']; ?>
                        </div>
                        <div class="card-footer">
                            <span class="small-text"><?php echo $date; ?></span>
                            <span style="float: right;"><a href="delete_post.php?id=<?php echo $row['id']; ?>" class="badge badge-danger"><i class="fa fa-trash"></i> O'chirish</a></span>
                        </div>
                    </div>
                    <br>
                <?php } ?>
        </div>
    </div>
</div>

<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/jquery.slim.min.js"></script>
<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>