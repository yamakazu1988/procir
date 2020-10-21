<?php
$dsh = 'mysql:dbname=procir_Yamaguchi418;host=localhost;charset=utf8';
$root = 'Yamaguchi418';
$pass = '3pwfu4foij';
try {
	$db = new PDO($dsh, $root, $pass);
} catch (PDOException $e) {
	echo 'Error:接続不可';
}
?>
