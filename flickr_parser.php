<?php

$url = $_GET["url"];

if (is_null($url))
{
	echo "failed";
	return;
}

$url = trim($url);
$contents = htmlspecialchars(file_get_contents($url));
if (!$contents)
{
	echo "failed";
	return;
}
preg_match('/https:\/\/farm.\.staticflickr\.com\/.*_z\.jpg/', $contents, $matches, PREG_OFFSET_CAPTURE);

echo $matches[0][0];

?>