<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ニックネーム一覧</title>
</head>
<body>
<?php
$res = json_decode(file_get_contents("http://49.212.141.66/DYY/list.php"), true);

$members = array();

foreach ($res as $data)
{
	$members[] = $data["nickname"];
}
$members = array_unique($members);

foreach ($members as $member)
{
	echo $member."<br>";
}

?>
</body>
</html>