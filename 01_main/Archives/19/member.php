<?php
session_start();
$error = null;
$edit = null;
$ban = null;
if (!isset($_SESSION['id'])) {
	$ban = 'アクセスエラー';
} else {
	if (!empty($_GET['member_id'])) {
		$member_id = $_GET['member_id'];
		require('dbconnect.php');
		$members = $db->prepare('SELECT * FROM members WHERE id = ?');
		$members->execute(array($member_id));
		$member = $members->fetch();
		if ($member) {
			if ($member_id == $_SESSION['id']) {
				$edit = '内容を編集する場合は下の「編集画面へ」を押下してください';
			}
		} else {
			$error = '対象の会員が存在しません';
		}
	} else {
		$ban = 'アクセスエラー';
	}
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>会員情報</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid p-5">
<h1>会員情報</h1>
<p><?= $member['name']; ?>さんの情報</p>
<hr>
<?php if ($ban): ?>
<p><?= $ban; ?></p>
<p><a href="login.php">ログイン画面へ</a></p>
<?php elseif ($error): ?>
<p><?= $error; ?></p>
<p><a href="index.php">戻る</a></p>
<?php else: ?>
<table class="table table-striped">
<thead class="thead-dark">
<tr>
<th>項目</th>
<th>情報</th>
</tr>
</thead>
<tbody>
<tr>
<td>ユーザー名</td>
<td><?= $member['name']; ?></td>
</tr>
<tr>
<td>ユーザー画像</td>
<td>
<?php if (empty($member['picture'])): ?>
未登録
<?php else: ?>
<img src="member_picture/<?= htmlspecialchars($member['picture'], ENT_QUOTES); ?>" width="100" height="100">
<?php endif; ?>
</td>
</tr>
<tr>
<td>メールアドレス</td>
<td><?= $member['email']; ?></td>
</tr>
<tr>
<td>一言コメント</td>
<td><?= htmlspecialchars($member['comment'], ENT_QUOTES); ?></td>
</tr>
</tbody>
</table>
<?php if($edit): ?>
<p style="color: #00F;"><?= $edit; ?></p>
<p><a href="member_edit.php?member_id=<?= htmlspecialchars($member['id'], ENT_QUOTES); ?>">編集画面へ</a></p>
<?php endif; ?>
<hr>
<p><a href="index.php">戻る</a></p>
<?php endif; ?>
</div>
</body>
</html>
