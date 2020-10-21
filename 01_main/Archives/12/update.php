<?php
// 入力チェック
if (isset($_POST['id']) && isset($_POST['height'])) {
	if ($_POST['id'] != "" && $_POST['height'] != "") {
		// 数字チェック(10~999)
		if (preg_match('/^([1-9][0-9]{1,2})$/', $_POST['height'])) {
			$id = $_POST['id'];
			$height = $_POST['height'];
			// DB接続
			$dsh = 'mysql:dbname=procir_Yamaguchi418;host=localhost;charset=utf8mb4';
			$name = 'Yamaguchi418';
			$password = '3pwfu4foij';
			try {
				$dbh = new PDO($dsh, $name, $password);
			} catch (PDOException $e) {
				echo 'Error:接続不可';
				die();
			}
			// 検索処理
			$sql = "SELECT * FROM users WHERE id = :id";
			$stm = $dbh->prepare($sql);
			$stm->bindValue(":id", $id);
			$stm->execute();
			// UPDATE処理
			if ($stm->rowCount()) {
				$content = $stm->fetch(PDO::FETCH_ASSOC);
				$beforeHeight = $content['height'];
				$sql2 = "UPDATE users SET height = :height WHERE id = :id";
				$stm2 = $dbh->prepare($sql2);
				$params = array(':height' => $height, ':id' => $id);
				$stm2->execute($params);
				$result = "データが更新されました。<br>(対象id:" . $id . " 変更カラム:height 変更内容:" . $beforeHeight . "→" . $height . ")";
			} else {
				$result = "Error:該当する'id'はありません。";
			}
		} else {
			$result = "Error:身長は数字、および2桁もしくは3桁(10-999)の数字で入力してください。";
		}
	} else {
		$result = "Error:未入力です。";
	}
} else {
	$result = "Error:未入力です。";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>Result</title>
</head>
<body>
<?= $result; ?>
</body>
</html>
