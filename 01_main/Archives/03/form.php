<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>Form</title>
</head>
<body>
<form action="calculate.php" method="post">
<label>number①:
<input type="text" name="num1"></br>
</label>演算子選択：
<select name="op" size=1>
<option value=""></option>
<option value="+">+</option>
<option value="-">-</option>
<option value="x">x</option>
<option value="÷">÷</option>
</select></br>
<label>number②:
<input type="text" name="num2"></br>
</label>
<input type="submit" value="送信">
</form>
</body>
</html>
