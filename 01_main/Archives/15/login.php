<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="ja">
<title>Login</title>
</head>
<body>
<p>メールアドレスとパスワードを入力してログインしてください。</p>
<form action="display_name.php" method="post">
<dl>
<dt>メールアドレス</dt>
<dd><input type="email" name="email" size="35" maxlength="255"></dd>
<dt>パスワード</dt>
<dd><input type="password" name="password" size="35" maxlength="255"></dd>
</dl>
<input type="submit" value="ログインする">
</body>
</html>
