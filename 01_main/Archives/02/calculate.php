<?php
if ((isset($_POST['num1']) && isset($_POST['num2'])) && ($_POST['num1'] != "" && $_POST['num2'] != "")) {
	$number1 = $_POST['num1'];
	$number2 = $_POST['num2'];
	if (is_numeric($number1) && is_numeric($number2)) {
		$result = $number1 + $number2;
	} else {
		$result = "数値以外の文字が入力されております。";
	}
} else {
	$result = "①と②に数字を入力してください。";
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>result</title>
</head>
<body>
<?php
echo $result;
?>
</body>
</html>
