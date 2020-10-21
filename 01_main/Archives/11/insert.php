<?php
// 1.入力チェック
if (isset($_POST['my_name']) && isset($_POST['height']) && isset($_POST['birthday'])) {
	if ($_POST['my_name'] != "" && $_POST['height'] != "" && $_POST['birthday'] != "") {
		$my_name = $_POST['my_name'];
		$height = $_POST['height'];
		$birthday = $_POST['birthday'];
		// 2.身長型チェック
		if (is_numeric($height)) {
			// 3.DB接続
			$dsh = 'mysql:dbname=procir_Yamaguchi418;host=localhost;charset=utf8mb4';
			$name = 'Yamaguchi418';
			$password = '3pwfu4foij';
			try {
				$dbh = new PDO($dsh, $name, $password);
			} catch (PDOException $e) {
				echo 'error(接続不可):' . $e->getMessage();
				die();
			}
			// 4.インサート処理
			$sql = "INSERT INTO users (name, height, birthday) VALUES (:name, :height, :birthday)";
			$stmt = $dbh->prepare($sql);
			$params = array(':name' => $my_name, ':height' => $height, ':birthday' => $birthday);
			$stmt->execute($params);
			$result = "データが挿入されました。";
		} else {
			$result = "error:身長は数字のみです。";
		}
	} else {
		$result = "error:全て入力してください。";
	}
} else {
	$result = "error:全て入力してください。";
}
?>

<!DOCTYPE html>
<html lamg="ja">
<head>
<meta charset="utf-8">
<title>Result</title>
</head>
<body>
<?= $result; ?>
</body>
</html>
