<?php

if ($argc < 2) {
	echo 'missing secret key' . PHP_EOL;
	exit(1);
}

$key = $argv[1]; // iwrupvqb

$answer5 = $answer6 = FALSE;
$i = 0;

while ($answer5 === FALSE || $answer6 === FALSE) {
	$str = md5($key . $i);

	if ($answer5 === FALSE && substr($str, 0, 5) === '00000') {
		$answer5 = $i;
	}

	if ($answer6 === FALSE && substr($str, 0, 6) === '000000') {
		$answer6 = $i;
	}

	$i++;
}

echo '5 zero answer: ' . $answer5 . PHP_EOL;
echo '6 zero answer: ' . $answer6 . PHP_EOL;
