<?php

$error = intval($_GET['error']);

$error_array = array(
	400 => array(
		'title' => 'Xato 400 - Noto`g`ri so`rov',
		'text' => 'Brauzeringiz serverga noto`g`ri so`rov yubordi'
	),
	401 => array(
		'title' => 'Xato 401 - avtorizatsiya talab qilinadi',
		'text' => 'So`ralgan sahifaga kirish uchun avtorizatsiya talab qilinadi.'
	),
	403 => array(
		'title' => 'Xato 403 - kirish taqiqlandi',
		'text' => 'So`ralgan sahifaga kirish taqiqlangan.'
	),
	404 => array(
		'title' => 'Xato 404 - sahifa topilmadi',
		'text' => 'Sahifa topilmadi, u o`chirilgan bo`lishi mumkin yoki hech qachon bu yerda bo`lmagan.'
	),
	500 => array(
		'title' => 'Xato 500 - ichki serverdagi xato',
		'text' => 'Ichki serverda xatolik yuz berdi. Sahifani qayta yuklang yoki keyinroq urinib ko`ring.'
	)
);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div style="text-align: center;">
                    <h1 style="font-size: 100px"><?php echo $error; ?></h1>
                    <h2><?php echo $error_array[$error]['title']; ?></h2>
                    <h4><?php echo $error_array[$error]['text']; ?></h4>
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/" class="btn btn-primary">Bosh sahifaga qaytish</a>
                </div>
            </div>
        </div>
    </div>
	
<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/jquery.slim.min.js"></script>
<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>