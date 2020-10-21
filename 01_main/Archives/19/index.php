<?php
session_start();
$error = null;
// ログインチェック
if (!empty($_POST['login'])) {
	if (isset($_POST['email']) && isset($_POST['password'])) {
		if ($_POST['email'] != "" && $_POST['password'] != "") {
			$email = $_POST['email'];
			$password = $_POST['password'];
			require('dbconnect.php');
			$members = $db->prepare('SELECT * FROM members WHERE email = ?');
			$members->execute(array($email));
			// メールアドレス登録確認
			$member = $members->fetch();
			if ($member) {
				// パスワード確認
				if ($member['password'] == $password) {
					// session情報セット
					$_SESSION['id'] = $member['id'];
					$_SESSION['name'] = $member['name'];
				} else {
					$error = "パスワードが異なります";
				}
			} else {
				$error = "メンバーが存在しません";
			}
		} else {
			$error = "メールアドレス、もしくはパスワードが未入力です";
		}
	} else {
		$error = "メールアドレス、もしくはパスワードが未入力です";
	}
} elseif (!empty($_SESSION)) {
	$error = '';
}
if (!empty($_GET)) {
	$_SESSION['id'] = 0;
	$error = '';
}

if (empty($error)) {
	require('dbconnect.php');
	$posts = $db->prepare('SELECT m.name, p.* FROM members m, posts p WHERE m.id = p.member_id AND p.deleted_flg IS NULL ORDER BY p.created_at DESC');
	$posts->execute();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<?php if($error): ?>
<title>Error</title>
<?php else: ?>
<title>一覧画面</title>
<?php endif; ?>
</head>

<body>
<div class="container-fluid p-5">
<?php if($error): ?>
<h1>ログインエラー</h1>
<p><?= $error; ?></p>
<a href="login.php">戻る</a>
<?php else: ?>
<h1>掲示板</h1>
<hr>
<div class="d-flex justify-content-between">
<p><a href="write.php">新規投稿</a></p>
<?php if ($_SESSION['id'] != 0): ?>
<form action="login.php" method="post">
<button tyoe="submit" class="btn btn-primary" name="logout" value="logout">ログアウト</button>
</form>
<?php else: ?>
<p style="text-align: right"><a href="login.php">ログイン画面へ</a></p>
<?php endif; ?>
</div>
<hr>
<h4>投稿一覧</h4>
<table class="table table-striped">
<thead class="thead-dark">
<tr>
<th>#</th>
<th>ユーザー名</th>
<th>編 集</th>
<th>削 除</th>
<th>タイトル</th>
<th>本 文</th>
<th>投稿日時</th>
</tr>
</thead>
<tbody>
<?php foreach ($posts as $post): ?>
<tr>
<td><?= $post['id']; ?></td>
<td><a href="member.php?member_id=<?= htmlspecialchars($post['member_id'], ENT_QUOTES); ?>"><?= htmlspecialchars($post['name'], ENT_QUOTES); ?></a></td>
<?php if($_SESSION['id'] == $post['member_id']): ?>
<td>
<form action="edit.php" method="post">
<button type="submit" class="btn btn-secondary" name="id" value="<?= $post['id']; ?>">編集</button>
</form>
</td>
<td>
<form action="delete.php" method="post">
<button type="submit" class="btn btn-danger" name="id" value="<?= $post['id']; ?>">削除</button>
</form>
</td>
<?php else: ?>
<td></td>
<td></td>
<?php endif; ?>
<td><?= htmlspecialchars($post['title'], ENT_QUOTES); ?></td>
<td><?= htmlspecialchars($post['message'], ENT_QUOTES); ?></td>
<td><?php echo date('Y/m/d H:i', strtotime($post['created_at'])); ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>
</div>
</body>

</html>
