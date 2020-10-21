<?php
session_start();
$_SESSION = array();
setcookie(session_name(), '', 0, '/');
session_destroy();
if (!empty($_POST['logout'])) {
	$result = 'ログアウトしました';
} else {
	$result = 'メールアドレスとパスワードを入力してください。';
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ログイン</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid p-5">
<h1>ログイン</h1>
<hr>
<p><?= $result; ?></p>
<form action="index.php" method="post">
<div class="form-group">
<dl>
<dt>メールアドレス</dt>
<dd><input class="form-control" type="email" name="email" size="35" maxlength="255"></dd>
<dt>パスワード</dt>
<dd><input class="form-control" type="password" name="password" size="35" maxlength="255"></dd>
</dl>
</div>
<input class="btn btn-dark" type="submit" value="ログイン">
<input type="hidden" name="login" value="login">
</form>
<hr>
<p><a href="index.php?id=0">閲覧のみ</a></p>
<p><a href="join.php">会員登録をする</a></p>
</div>
</body>
</html>
