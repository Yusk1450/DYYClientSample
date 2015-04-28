<?php

$url = $_GET["url"];

if (is_null($url))
{
	echo "failed";
	return;
}

$url = trim($url);
$context = stream_context_create(array('http'=>array('user_agent'=>'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)')));
$contents = htmlspecialchars(file_get_contents($url, false, $context));
if (!$contents)
{
	echo "failed";
	return;
}
preg_match('/https?:\/\/farm.\.staticflickr\.com\/.*_z\.jpg/', $contents, $matches, PREG_OFFSET_CAPTURE);
echo $matches[0][0];

?>