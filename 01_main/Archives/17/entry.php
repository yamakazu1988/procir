<?php
$error = null;
$ban =null;
if (!empty($_POST)) {
	if ($_POST['name'] === '') {
		$error = '・名前がブランクです';
	}
	if ($_POST['email'] === '') {
		if ($error) {
			$error = $error . '<br>' . '・メールアドレスがブランクです';
		} else {
			$error = '・メールアドレスがブランクです';
		}
	}
	if ($_POST['password'] === '') {
		if ($error) {
			$error = $error . '<br>' . '・パスワードがブランクです';
		} else {
			$error = '・パスワードがブランクです';
		}
	}
	if ($_POST['password'] != '' && strlen($_POST['password']) < 8) {
		if ($error) {
			$error = $error . '<br>' . '・パスワードは8文字以上で設定してください';
		} else {
			$error = '・パスワードは8文字以上で設定してください';
		}
	}
} else {
	$ban = 1;
}
if (empty($error) && empty($ban)) {
	require('dbconnect.php');
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$member = $db->prepare('SELECT COUNT(*) AS cnt FROM members WHERE email = ?');
	$member->execute(array($email));
	$record = $member->fetch();
	if ($record['cnt'] > 0) {
		$error = '指定したメールアドレスは既に登録されています';
	} else {
		$statement = $db->prepare('INSERT INTO members SET name = ?, email = ?, password = ?, created_at = NOW()');
		$e = $statement->execute(array($name, $email, $password));
	}
}
?>
<!DOCTYPE html>
<html lamg="ja">
<head>
<meta charset="utf-8">
<?php if($error): ?>
<title>エラー</title>
<?php else: ?>
<title>会員登録完了</title>
<?php endif; ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
<?php if ($ban): ?>
<p>ログインエラー<p>
<p><a href="login.php">ログイン画面へ</a></p>
<?php else: ?>
<?php if($error): ?>
<h1 style="color: #F55">会員登録エラー</h1>
<p><?= $error; ?></p>
<p><a href="join.php">会員登録画面へ</a></p>
<?php else: ?>
<h1>会員登録完了</h1>
<table class="table">
<tr>
<th>項目</th>
<th>登録情報</th>
</tr>
<tr>
<td>お名前</td>
<td><?= htmlspecialchars($name, ENT_QUOTES); ?></td>
</tr>
<tr>
<td>メールアドレス</td>
<td><?= htmlspecialchars($email, ENT_QUOTES); ?></td>
</tr>
<tr>
<td>パスワード</td>
<td><?= htmlspecialchars($password, ENT_QUOTES); ?></td>
</tr>
</table>
<?php endif; ?>
<p><a href="login.php">ログイン画面へ</a></p>
</div>
<?php endif; ?>
</body>
</html>
