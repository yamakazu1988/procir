<?php
$dsh = 'mysql:dbname=procir_Yamaguchi418;host=localhost;charset=utf8mb4';
$name = 'Yamaguchi418';
$password ='3pwfu4foij';
try {
	$dbh = new PDO($dsh, $name, $password);
} catch (PDOException $e) {
	echo '接続不可';
	die();
}
$sql = 'SELECT * FROM MTMenu';
$contents = $dbh->query($sql);
$dbh = null;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>Form</title>
</head>
<body>
<h1>筋トレメニュー</h1>
<form action="result.php" method="post">
<select name="id">
<?php foreach ($contents as $content): ?>
<option value="<?= $content['id']; ?>"><?= $content['name'] ?></option>
<?php endforeach; ?>
</select>
<input type="submit" value="送信">
</form>
</body>
</html>
