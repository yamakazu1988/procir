<?php
$result = null;
$re = null;
if (!empty($_POST['reset'])) {
	if (empty($_POST['password'])) {
		$re = 'パスワードを入力してください';
	} elseif (strlen($_POST['password'])< 8) {
		$re = 'パスワードは半角英数字8文字以上で入力してください';
	} else {
		$re = null;
		$password = $_POST['password'];
	}
	if (empty($re)) {
		if (!empty($_GET['passReset'])) {
			$reset_pass = $_GET['passReset'];
			require('dbconnect.php');
			$members = $db->prepare('SELECT * FROM members WHERE reset_pass = ?');
			$members->execute(array($reset_pass));
			$member = $members->fetch();
			if ($member) {
				$id = $member['id'];
				$dtobj = new DateTime();
				$dtobj->setTimeZone(new DateTimeZone('Asia/Tokyo'));
				$current_time = $dtobj->format('Y-m-d H:i:s');
				$target_time = date("Y-m-d H:i:s", strtotime($member['reset_time'] . "+ 30 minute"));
				if ($target_time > $current_time) {
					$members = $db->prepare('UPDATE members SET reset_pass = null, reset_time = null, password = ? WHERE id = ?');
					$members->execute(array($password, $id));
					$result = 'パスワードを変更いたしました。';
				} else {
					$result = '不正なアクセスです。再度アクセスしてください。';
				}
			} else {
				$result = '不正なアクセスです。再度アクセスしてください。';
			}
		} else {
			$result = '不正なアクセスです。再度アクセスしてください。';
		}
	}
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>パスワード再設定</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid p-5">
<h1>パスワード再設定</h1>
<hr>
<?php if ($result): ?>
<?= $result; ?>
<?php else: ?>
<?php if ($re): ?>
<?= $re; ?>
<?php endif; ?>
<form action="" method="post">
<div class="form-group">
<dl>
<dt>新規パスワード</dt>
<dd><input class="form-control" type="password" name="password" size="35" maxlength="255"></dd>
</dl>
</div>
<input class="btn btn-dark" type="submit" value="登録する">
<input type="hidden" name="reset" value="reset">
</form>
<?php endif; ?>
<hr>
<p><a href="login.php">ログイン画面へ戻る</a></p>
</div>
</body>
</html>
