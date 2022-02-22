<?php

include "db_config.php";

date_default_timezone_set('Asia/Tashkent');

$query = $conn->query("SELECT * FROM posts");

while($res = $query->fetch_assoc()) {
	
	$second = time() - $res['createdAt'];
	$minut = intval($second / 60);
	$hours = intval($second / 3600);
	$day = intval($second / 86400);

	echo "<p>" . $second . " sekund</p>";
	echo "<p>" . $minut . " minut</p>";
	echo "<p>" . $hours . " soat</p>";
	echo "<p>" . $day . " kun</p>";

}
