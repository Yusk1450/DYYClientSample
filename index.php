<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>サンプルコード</title>
	<style>
		a { color: #000000; }
		a:hover { color: #ff0000; }
		th
		{
			color: #ffffff;
			background-color: #4c4c4c;
			font-size: 16px;
			font-weight: normal;
		}
		td
		{
			min-width: 120px;
			background-color: #f4f4f4;
			font-size: 12px;
		}
	</style>
</head>
<body>
<table>
<tr>
	<th>手垢登録日</th>
	<th>ニックネーム</th>
	<th>名称</th>
	<th>分類</th>
	<th>場所</th>
	<th>特徴</th>
	<th>種類</th>
	<th>パターン</th>
	<th>色</th>
	<th>形</th>
	<th>登録用紙</th>
</tr>
<?php

$res = json_decode(file_get_contents("http://49.212.141.66/DYY/list.php"), true);
$html = "";

foreach ($res as $data)
{
	$html .= "<tr>";
	$html .= "<td>".$data["timestamp"]."</td>";							// 手垢登録日
	$html .= "<td>".$data["nickname"]."</td>";
	$html .= "<td>".$data["title"]."</td>";								// 名称
	$html .= "<td>".implode(", ", $data["categories"])."</td>";			// 分類
	$html .= "<td>".implode(", ", $data["mark_positions"])."</td>";		// 場所
	$html .= "<td>".implode(", ", $data["characteristics"])."</td>";	// 特徴
	$html .= "<td>".implode(", ", $data["types"])."</td>";				// 種類
	$html .= "<td>".implode(", ", $data["patterns"])."</td>";			// パターン
	$html .= "<td>".implode(", ", $data["colors"])."</td>";				// 色
	$html .= "<td>".implode(", ", $data["shapes"])."</td>";				// 形
	$html .= '<td><a href="registration_form.php?book_id='.$data["index"].'" target="_blank">表示</a></td>';
	$html .= "</tr>";
}

echo $html;

?>
</table>

</body>
</html>