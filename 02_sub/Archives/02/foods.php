<?php
$foods = array(
	1 => "肉",
	2 => "野菜",
	3 => "卵",
);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>foods
</title>
</head>
<body>
<?php foreach ($foods as $key => $result): ?>
<a href="result.php?id=<?php echo $key; ?>"><?php echo $result . '<br>'; ?></a>
<?php endforeach; ?>
</body>
</html>
