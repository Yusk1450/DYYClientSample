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
		th a
		{
			color: #ffffff;
			text-decoration: none;
			border-bottom: 1px dotted;
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
	<th id="timestamp"><a href="index.php?s=timestamp">手垢登録日</a></th>
	<th id="nickname"><a href="index.php?s=nickname">ニックネーム</a></th>
	<th id="title"><a href="index.php?s=title">名称</a></th>
	<th id="categories"><a href="index.php?s=categories">分類</a></th>
	<th id="mark_positions"><a href="index.php?s=mark_positions">場所</a></th>
	<th id="characteristics"><a href="index.php?s=characteristics">特徴</a></th>
	<th id="types"><a href="index.php?s=types">種類</a></th>
	<th id="patterns"><a href="index.php?s=patterns">パターン</a></th>
	<th id="colors"><a href="index.php?s=colors">色</a></th>
	<th id="shapes"><a href="index.php?s=shapes">形</a></th>
	<th>登録用紙</th>
</tr>
<?php

$res = json_decode(file_get_contents("http://49.212.141.66/DYY/list.php"), true);

$s = $_GET["s"];

if (!is_null($s))
{
	foreach ($res as $key => $val)
	{
		$key_id[$key] = $val[$s];
	}
	array_multisort($key_id, SORT_ASC, $res);
}

$html = "";

foreach ($res as $data)
{
	$html .= "<tr>";
	$html .= "<td>".$data["timestamp"]."</td>";							// 手垢登録日
	$html .= "<td>";
	if ($data["user_url"])
	{
		$html .= "<a href=".$data["user_url"]." target=_blank>";
	}
	$html .= $data["nickname"];
	if ($data["user_url"])
	{
		$html .= "</a>";
	}
	$html .= "</td>";
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

<script src="jquery-1.7.min.js"></script>
<script>

var s_type = <?php if (!is_null($_GET["s"])) {echo "'".$_GET["s"]."'";} else {echo "'timestamp'";} ?>;

if (s_type !== '')
{
	var sel = 'th#'+s_type;
	var text = $(sel+' > a').html();
	$(sel+' > a').remove();
	$(sel).append(text);
}

</script>

</body>
</html>