<?php
session_start();
if (isset($_SESSION['id'])) {
	$id = $_POST['id'];
	require('dbconnect.php');
	$messages = $db->prepare('SELECT * FROM posts WHERE id = ?');
	$messages->execute(array($id));
	$message = $messages->fetch();
	if ($message['member_id'] == $_SESSION['id']) {
		$del = $db->prepare('UPDATE posts SET deleted_flg = 1 WHERE id = ?');
		$del->execute(array($id));
		header('Location: index.php');
	} else {
		$result = '他の登録者の投稿は削除できません';
	}
} else {
	$result = 'ログイン情報がありません';
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>投稿削除</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
<p><?= $result; ?><p>
<p><a href="index.php">一覧へ戻る</a></p>
</div>
</body>
</html>
