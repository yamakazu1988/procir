<?php
// 変数セット
$dsh = 'mysql:dbname=procir_Yamaguchi418;host=localhost';
$user = 'Yamaguchi418';
$password = '3pwfu4foij';
// DB接続
try {
	$dbh = new PDO($dsh, $user, $password);
	echo '接続完了' . '<br>';
} catch (PDOException $e) {
	echo '接続不可:' . $e->getMessage();
	die();
}
// 接続完了の場合、usersテーブルのid表示
$sql = 'SELECT * FROM `users`';
$data = $dbh->query($sql);
if (!empty($data)) {
	echo '取得ID' . '<br>';
	foreach ($data as $value) {
		echo $value['id'] . '<br>';
	}
}
// 接続を切る
$dbh = null;
?>
