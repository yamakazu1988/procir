<?php
function calc($number1, $number2, $number3) {
	if (is_numeric($number1) && is_numeric($number2) && is_numeric($number3)) {
		return $answer = (($number1 + $number2) * $number3) / 2;
	} else {
		return null;
	}
}
$result1 = calc(4, 6, 5);
$result2 = calc(4, 'aaa', 5);
$result3 = calc(4, '', 5);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>daikei</title>
</head>
<body>
<?php
echo "計算結果：" . $result1 . "<br>";
echo "引数数字以外の結果：" . $result2 . "<br>";
echo "引数空の結果：" . $result3;
?>
</body>
</html>
