<?php
session_start();
$result = '投稿内容を入力してください';
$error = null;
$title = null;
$message = null;
if ($_SESSION['id'] == 0) {
	header('Location: join.php');
}
if (isset($_POST['new'])) {
	$title = $_POST['title'];
	$message = $_POST['message'];
	if ($title != '' && $message != '') {
		require('dbconnect.php');
		$post = $db->prepare('INSERT INTO posts SET title = ?, message = ?, member_id = ?, created_at = NOW()');
		$post->execute(array($title, $message, $_SESSION['id']));
		header('Location: index.php');
	} else {
		$error = '投稿内容が未入力です';
	}
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>新規投稿</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
<div class="container mt-5">
<h1>新規投稿</h1>
<hr>
<?php if ($error): ?>
<p><span style="color: #F55"><?= $error ?></span></p>
<?php else: ?>
<p><?= $result; ?></p>
<?php endif; ?>
<form action="" method="post">
<dl>
<dt>タイトル</dt>
<dd>
<textarea name="title" cols="80" rows="1"><?= htmlspecialchars($title, ENT_QUOTES); ?></textarea>
</dd>
<dt>メッセージ</dt>
<dd>
<textarea name="message" cols="80" rows="10"><?= htmlspecialchars($message, ENT_QUOTES); ?></textarea>
</dd>
</dl>
<p><input type="submit" value="投稿する"></p>
<input type="hidden" name="new">
</form>
<p><a href="index.php">掲示板に戻る</a></p>
</div>
</body>

</html>
