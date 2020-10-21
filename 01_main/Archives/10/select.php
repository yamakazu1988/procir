<?php
// 変数セット
$dsh = 'mysql:dbname=procir_Yamaguchi418;host=localhost';
$name = 'Yamaguchi418';
$password = '3pwfu4foij';

// DB接続
try {
	$dbh = new PDO($dsh, $name, $password);
} catch (PDOException $e) {
	echo '接続不可:' . $e->getMessage();
	die();
}

// 接続完了の場合、usersテーブルのid表示
$sql = 'SELECT * FROM `users`';
$users = $dbh->query($sql);

// 接続を切る
$dbh = null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<title>userデーブル</title>
<meta charset="utf-8">
</head>
<body>
<table border='1'>
<tr>
<th>id</th>
<th>name</th>
<th>height</th>
<th>birthday</th>
</tr>
<?php foreach ($users as $user): ?>
<tr>
<td><?= $user['id']; ?></td>
<td><?= $user['name']; ?></td>
<td><?= $user['height']; ?></td>
<td><?= $user['birthday']; ?></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>
