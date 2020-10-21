<?php
if ((isset($_GET['num1']) || isset($_GET['num2'])) && ($_GET['num1'] === "" || $_GET['num2'] === "")){
		$result = '未入力です。';
} else {
	if (is_numeric($_GET['num1']) && is_numeric($_GET['num2'])) { // 数値判別
		$result = $_GET['num1'] + $_GET['num2'];
	} else {
		$result = '数値以外が含まれています。';
	}
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>課題2受信フォーム</title>
</head>
<body>
<?php echo $result; ?>
<!-- 戻るボタン -->
<form action="form.php" method="GET">
<input type="submit" value="戻る">
</body>
</html>
