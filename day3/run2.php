<?php

if ($argc < 2) {
	echo 'missing input file' . PHP_EOL;
	exit(1);
}

$filename = $argv[1];

if (!is_file($filename)) {
	echo 'input file does not exist' . PHP_EOL;
	exit(1);
}

$input = str_split(file_get_contents($filename), 1);
$locations = array();
$x1 = $y1 = $x2 = $y2 = 0;

foreach ($input as $index => $direction) {
	if ($index % 2) {
		$x = &$x1;
		$y = &$y1;
	} else {
		$x = &$x2;
		$y = &$y2;
	}

	$location = $x . ':' . $y;
	if (!array_key_exists($location, $locations)) {
		$locations[$location] = 1;
	} else {
		$locations[$location]++;
	}

	switch ($direction) {
		case '^':
			$y++;
			break;

		case 'v':
			$y--;
			break;

		case '>':
			$x++;
			break;

		case '<':
			$x--;
			break;
	}

}

echo 'houses receiving presents: ' . count($locations) . PHP_EOL;
