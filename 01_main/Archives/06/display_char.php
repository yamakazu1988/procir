<?php
for ($num = 1; $num <= 50; $num++) {
	echo $num;
	if ($num % 3 == 0 || preg_match('/3/', (string)$num)) {
		echo 'プロサー';
	}
	echo '<br>';
}
?>
