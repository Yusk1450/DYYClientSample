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
$urls = array();

foreach ($res as $data)
{
	$members[] = $data["nickname"];
	$urls[] = $data["user_url"];
}
$members = array_unique($members);

$html = "";
foreach ($members as $key => $member)
{
	$url = $urls[$key];
	if ($url)
	{
		$html .= "<a href=".$url." target=_blank>";
	}
	$html .= $member;
	if ($url)
	{
		$html .= "</a>";
	}
	$html .= "<br>";
}

echo $html;

?>
</body>
</html>