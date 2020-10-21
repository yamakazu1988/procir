<?php
$insert_string = 'INSERT INTO tests (php_id, name) VALUES';
$collections = [
	1 => "PHP",
	2 => "CakePHP",
	3 => "Laravel"
];
$array = [];
foreach ($collections as $key => $content) {
	$value = sprintf("('%s', '%s')", $key, $content);
	array_push($array, $value);
}
$value = implode(',', $array);
$query = $insert_string . $value;
var_dump($query);
?>
