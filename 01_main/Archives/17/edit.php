<?php
session_start();
$result = '投稿内容を入力してください';
$error = null;
$ban = null;
if (empty($_SESSION['id']) && empty($_SESSION['name'])) {
	$ban = 1;
}
if (!empty($_POST['id'])) {
	$_SESSION['post_id'] = $_POST['id'];
}
if (isset($_POST['new'])) {
	if ($_POST['title'] != "" && $_POST['message'] != "") {
		require('dbconnect.php');
		$posts = $db->prepare('UPDATE posts SET title = ?, message = ? WHERE id = ?');
		$posts->execute(array($_POST['title'], $_POST['message'], $_SESSION['post_id']));
		header('Location: index.php');
	} else {
		$error = '投稿内容が未入力です';
	}
}
if (empty($ban)) {
	require('dbconnect.php');
	$posts = $db->prepare('SELECT * FROM posts WHERE id = ?');
	$posts->execute(array($_SESSION['post_id']));
	$post = $posts->fetch();
	if ($post['member_id'] != $_SESSION['id']) {
		$ban = 1;
	}
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<title>編集画面</title>
</head>
<body>
<?php if ($ban): ?>
<p>アクセスエラー<p>
<p><a href="login.php">ログイン画面へ</a></p>
<?php else: ?>
<div class="container mt-5">
<h1>編集</h1>
<hr>
<?php if ($error): ?>
<p><span style="color: #F55"><?= $error; ?></span></p>
<?php else: ?>
<p><?= $result; ?></p>
<?php endif; ?>
<form action="" method="post">
<dl>
<dt>タイトル</dt>
<dd>
<textarea name="title" cols="80" rows="1"><?= htmlspecialchars($post['title'], ENT_QUOTES) ?></textarea>
</dd>
<dt>メッセージ</dt>
<dd>
<textarea name="message" cols="80" rows="10"><?= htmlspecialchars($post['message'], ENT_QUOTES) ?></textarea>
</dd>
</dl>
<p><input type="submit" name="new" value="編集する"></p>
</form>
<p><a href="index.php">掲示板に戻る</a></p>
</div>
<?php endif; ?>
</body>

</html>
