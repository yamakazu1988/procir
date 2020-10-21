<?php
session_start();
$error = null;
$result = null;
$ban = null;
if (empty($_SESSION['id']) && empty($_SESSION['name'])) {
	$ban = 'アクセスエラー';
} else {
	if (!empty($_GET['member_id']) && ($_GET['member_id'] == $_SESSION['id'])) {
		require('dbconnect.php');
		$members = $db->prepare('SELECT * FROM members WHERE id = ?');
		$members->execute(array($_SESSION['id']));
		$member = $members->fetch();
		if ($member == 'false') {
			$error = '対象の会員が存在しません';
		}
	} else {
		$ban = 'アクセスエラー';
	}
}
if (empty($error) && !empty($_POST['edit'])) {
	$type = $_FILES['picture']['tmp_name'];
	if (!empty($type)) {
		if (exif_imagetype($type) == IMAGETYPE_GIF) {
			$ext = 'gif';
		} elseif (exif_imagetype($type) == IMAGETYPE_JPEG) {
			$ext = 'jpeg';
		} elseif (exif_imagetype($type) == IMAGETYPE_PNG) {
			$ext = 'png';
		} else {
			$error = 'ファイルの形式が正しくありません';
		}
	}
	if (empty($error)) {
		require('dbconnect.php');
		$dir = 'member_picture/';
		if (!empty($_POST['check'])) {
			$picture = null;
			if (!empty($member['picture']) && file_exists($dir . $member['picture'])) {
				unlink($dir . $member['picture']);
			}
		} else {
			if (!empty($_FILES['picture']['name'])) {
				$picture = (md5(uniqid(rand(), true))) . '.' . $ext;
				move_uploaded_file($_FILES['picture']['tmp_name'], $dir . $picture);
				if (!empty($member['picture']) && file_exists($dir . $member['picture'])) {
					unlink($dir . $member['picture']);
				}
			} else {
				$picture = $member['picture'];
			}
		}
		if (empty($_POST['comment'])) {
			$comment = null;
		} else {
			$comment = $_POST['comment'];
		}
		$edit  = $db->prepare('UPDATE members SET picture = ?, comment = ? WHERE id = ?');
		$edit->execute(array($picture, $comment, $_SESSION['id']));
		$members = $db->prepare('SELECT * FROM members WHERE id = ?');
		$members->execute(array($_SESSION['id']));
		$member = $members->fetch();
		$result = '内容を編集しました';
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
<h1>会員情報編集</h1>
<?php if ($ban): ?>
<p><?= $ban; ?></p>
<p><a href="login.php">ログイン画面へ</a></p>
<?php elseif ($error): ?>
<p><?= $error; ?></p>
<p><a href="member_edit.php?member_id=<?= htmlspecialchars($member['id'], ENT_QUOTES); ?>">編集画面へ</a></p>
<?php else: ?>
<p><?= $member['name']; ?>さんの情報</p>
<hr>
<?php if ($result): ?>
<?= $result; ?>
<?php endif; ?>
<form action="" method="post" enctype="multipart/form-data">
<table class="table table-striped">
<thead class="thead-dark">
<tr>
<th>項目</th>
<th>情報</th>
</tr>
</thead>
<tbody>
<tr>
<td>ユーザー画像</td>
<td>
<?php if ($result): ?>
<?php if (empty($member['picture'])): ?>
未登録
<?php else: ?>
<img src="member_picture/<?= htmlspecialchars($member['picture'], ENT_QUOTES); ?>" width="100" height="100">
<?php endif; ?>
<?php else: ?>
<?php if (empty($member['picture'])): ?>
未登録
<?php else: ?>
<p><img src="member_picture/<?= htmlspecialchars($member['picture'], ENT_QUOTES); ?>" width="100" height="100"></p>
<?php endif; ?>
<p><input type="file" name="picture" size="35"></p>
<p><input type="checkbox" name="check" value="check"> 登録画像を削除する</p>
<?php endif; ?>
</td>
</tr>
<tr>
<td>一言コメント</td>
<td>
<?php if ($result): ?>
<?= htmlspecialchars($member['comment'], ENT_QUOTES); ?>
<?php else: ?>
<textarea name="comment" cols="80" rows="3"><?= htmlspecialchars($member['comment'], ENT_QUOTES); ?></textarea>
<?php endif; ?>
</td>
</tr>
</tbody>
</table>
<?php if ($result): ?>
<p><a href="member_edit.php?member_id=<?= $member['id']; ?>">編集画面へ</a></p>
<p><a href="index.php">掲示板へ戻る</a></p>
<?php else: ?>
<input type="submit" name="edit" value="編集する">
</form>
<hr>
<p><a href="member.php?member_id=<?= htmlspecialchars($member['id'], ENT_QUOTES); ?>">戻る</a></p>
<?php endif; ?>
<?php endif; ?>
</div>
</body>
</html>
