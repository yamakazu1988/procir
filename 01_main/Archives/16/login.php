<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<?php if ($_SESSION): ?>
<title>MyPage</title>
<?php else: ?>
<title>Login</title>
<?php endif; ?>
</head>
<body>
<?php if ($_SESSION): ?>
<p>ユーザー名:<?= htmlspecialchars($_SESSION['name'], ENT_QUOTES); ?></p>
<a href="logout.php">ログアウトする</a>
<?php else: ?>
<p>メールアドレスとパスワードを入力してログインしてください。</p>
<form action="session.php" method="post">
<dl>
<dt>メールアドレス</dt>
<dd><input type="email" name="email" size="35" maxlength="255"></dd>
<dt>パスワード</dt>
<dd><input type="password" name="password" size="35" maxlength="255"></dd>
</dl>
<input type="submit" value="ログインする">
<?php endif; ?>
</body>
</html>
