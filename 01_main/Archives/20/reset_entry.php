<?php
$result = null;
$error = null;
if (!empty($_POST['reset'])) {
	if (!empty($_POST['email'])) {
		require('dbconnect.php');
		$email = $_POST['email'];
		$members = $db->prepare('SELECT * FROM members WHERE email = ?');
		$members->execute(array($email));
		$member = $members->fetch();
		if ($member) {
			$passReset = md5(uniqid(rand(), true));
			$url = 'https://procir-study.site/Yamaguchi418/01_main/19/reset_form.php?passReset=' . $passReset;
			$members = $db->prepare('UPDATE members SET reset_pass = ?, reset_time = NOW() WHERE email = ?');
			$members->execute(array($passReset, $email));
			mb_language('Japanese');
			mb_internal_encoding('utf-8');
			$to = $email;
			$subject = '[プロサー掲示板]ログインパスワード変更';
			$message = '下記サイトにアクセスしてパスワードを変更手続きをしてください。' . "\r\n" . $url . "\r\n" . '(パスワードの変更期限は30分以内となります。)';
			$headers = 'From: ky02161988@outlook.jp' . "\r\n";
			mb_send_mail($to, $subject, $message, $headers);
		}
		$result = '登録済みのアドレスにパスワード再設定用のURLをお送りしました。' . '<br>' . '30分以内に変更手続きをお願いいたします';
	} else {
		$error = 'メールアドレスを入力してください';
	}
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>パスワード再設定依頼</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid p-5">
<h1>パスワード再設定依頼</h1>
<hr>
<?php if ($result): ?>
<?= $result; ?>
<?php else: ?>
<?php if ($error): ?>
<?= $error; ?>
<?php endif; ?>
<form action="" method="post">
<div class="form-group">
<dl>
<dt>登録済みのメールアドレス</dt>
<dd><input class="form-control" type="email" name="email" size="35" maxlength="255"></dd>
</dl>
</div>
<input class="btn btn-dark" type="submit" value="再設定依頼をする">
<input type="hidden" name="reset" value="reset">
</form>
<?php endif; ?>
<hr>
<p><a href="login.php">ログイン画面へ戻る</a></p>
</div>
</body>
</html>
