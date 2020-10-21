<?php
session_start();
$_SESSION = array();
setcookie(session_name(), '', 0, '/');
session_destroy();
?>
<!DOCTYPE html>
<head lang="ja">
<meta charset="utf-8">
<title>Logout</title>
</head>
<body>
<p>ログアウトしました。<p/>
<a href="login.php">再ログインする</a>
</body>
</html>
