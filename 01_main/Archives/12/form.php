<!DOCTYPE html>
<html lamg="ja">
<head>
<meta charset="utf-8">
<title>Form</title>
</head>
<body>
<h1>入力フォーム</h1>
<p>変更対象id、変更希望身長を入力してください。</p>
<form action="update.php" method="post">
<pre>--検索条件--</pre>
<label>id:</label>
<input type="text" name="id"><br>
<pre>--変更内容--</pre>
<label>身長:</label>
<input type="text" name="height"><br>
<input type="submit" value="更新">
</form>
</body>
</html>
