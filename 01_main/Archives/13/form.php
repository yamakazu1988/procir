<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>Form</title>
</head>
<body>
<h1>入力フォーム</h1>
<p>削除対象idを入力してください。</p>
<form action="delete.php" method="post">
<pre>--削除対象id--</pre>
<label>id:</label>
<input type="text" name="id"><br>
<input type="submit" value="削除">
</form>
</body>
</html>
