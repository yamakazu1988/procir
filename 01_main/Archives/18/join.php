<?php
session_start();
if (!empty($_SESSION['id']) && !empty($_SESSION['name'])) {
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>会員登録</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid p-5">
<h1>会員登録</h1>
<hr>
<p>次のフォームに必要事項を記入してください。</p>
<form action="entry.php" method="post">
<dl>
<dt>お名前</dt>
<dd>
<input type="text" name="name" size="35" length="255">
</dd>
<dt>メールアドレス</dt>
<dd>
<input type="email" name="email" size="35" length="255">
</dd>
<dt>パスワード(半角英数字8文字以上)</dt>
<dd>
<input type="password" name="password" size="35" length="255">
</dl>
<p><input type="submit" value="登録する"></p>
</form>
<p><a href="login.php">ログイン画面に戻る</a></p>
</div>
</body>
</html>
