<?php
if (!empty($_POST['search'])) {
	$search = $_POST['search'];
	$dsh = 'mysql:dbname=procir_Yamaguchi418;host=localhost';
	$name = 'Yamaguchi418';
	$password = '3pwfu4foij';
	try {
		$dbh = new PDO($dsh, $name, $password);
	} catch (PDOException $e) {
		echo 'Error(接続不可)';
		die();
	}
	$stm = $dbh->prepare("SELECT * FROM users WHERE name LIKE :search_name");
	$stm->bindValue(":search_name", '%' . addcslashes($search, '\_%') . '%');
	$stm->execute();
	if ($stm->rowCount() == 0) {
		$result = '該当する名前はありません。';
	}
} else {
	$result = '検索内容を入力してください。';
	$search = '';
}
?>
<!DOCTYPE html>
<html lamg="ja">
<head>
<meta charset="utf-8">
<title>Name Search</title>
</head>
<body>
<form action="" method="post">
<h1>名前検索</h1>
<input type="text" name="search" value="
<?= $search; ?>
">
<input type="submit" value="検索">
<br>
<?php
if (!empty($result)) :
	echo $result;
else :
?>
<table border='1'>
<tr>
<th>id</th>
<th>name</th>
<th>height</th>
<th>birthday</th>
</tr>
<?php foreach ($stm as $value): ?>
<tr>
<td><?= $value['id']; ?></td>
<td><?= $value['name']; ?></td>
<td><?= $value['height']; ?></td>
<td><?= $value['birthday']; ?></td>
</tr>
<?php endforeach; ?>
<?php  endif; ?>
</form>
</body>
</html>
