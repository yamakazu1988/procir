<?php
if (is_numeric($_POST['num1']) && is_numeric($_POST['num2'])) {
	$number1 = $_POST['num1'];
	$number2 = $_POST['num2'];
	$op = $_POST['op'];
	switch ($op) {
		case "+":
			$result = $number1 + $number2;
			break;
		case "-":
			$result = $number1 - $number2;
			break;
		case "x":
			$result = $number1 * $number2;
			break;
		case "÷":
			if ($number2 == 0) {
				$result = "0では割れません。";
			} else {
				$result = $number1 / $number2;
			}
			break;
		default:
			$result = "演算子が選択されておりません。";
	}
} else {
	$result = "値が空欄、もしくは数字以外が含まれています。";
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
