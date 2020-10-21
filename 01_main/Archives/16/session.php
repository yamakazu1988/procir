<?php
session_start();
// 入力値チェック
if (isset($_POST['email']) && isset($_POST['password'])) {
	if ($_POST['email'] != "" && $_POST['password'] != "") {
		$email = $_POST['email'];
		$password = $_POST['password'];
		// DB接続
		$dsh = 'mysql:dbname=procir_Yamaguchi418;host=localhost;charset=utf8mb4';
		$name = 'Yamaguchi418';
		$pass = '3pwfu4foij';
		try {
			$dbh = new PDO($dsh, $name, $pass);
		} catch (PDOException $e) {
			echo 'Error:接続不可';
			die();
		}
		$sql = "SELECT * FROM members WHERE mail = :email";
		$stm = $dbh->prepare($sql);
		$stm->bindValue(":email", $email);
		$stm->execute();
		// メールアドレス登録確認
		$info = $stm->fetch();
		if ($info) {
			// パスワード確認
			if (password_verify($password, $info['pass'])) {
				$result = "welcome " . $info['name'] . "さん";
				// session情報セット
				$_SESSION['id'] = $info['id'];
				$_SESSION['name'] = $info['name'];
			} else {
				$result = "パスワードが異なります。";
			}
		} else {
			$result = "メンバーが存在しません。";
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
<p><?= $result; ?></p>
<a href="login.php">戻る</a>
