<?php
// 入力チェック
if (isset($_POST['id']) && $_POST['id'] != "") {
	if (is_numeric($_POST['id'])) {
		if (!preg_match('/^[0]+/', $_POST['id'])) {
			$id = $_POST['id'];
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
			$sql1 = "SELECT * FROM users WHERE id = :id";
			$stm1 = $dbh->prepare($sql1);
			$stm1->bindValue(":id", $id);
			$stm1->execute();
			$count = $stm1->rowCount();
			if ($count) {
				$sql2 = "DELETE FROM users WHERE id = :id";
				$stm2 = $dbh->prepare($sql2);
				$stm2->bindValue(":id", $id);
				$stm2->execute();
				$result = "id:" . $id . "を削除しました。";
			} else {
				$result = "Error:該当するid(" . $id . ")はありません。";
			}
		} else {
			$result = "Error:0、およびid数字の前に0は入力しないでください。(例：001)";
		}
	} else {
		$result = "Error:半角数字で入力してください。";
	}
} else {
	$result = "Error:未入力です。";
}
?>

<!DOCTYPE html>
<html lamg="ja">
<head>
<meta charset="utf-8">
<title>Result</title>
</head>
<body>
<p><?= $result; ?></p>
<a href="form.php">戻る</a>
</body>
</html>
