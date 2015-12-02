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
$basement = FALSE;
$floor = 0;

foreach ($input as $position => $command) {
	if ($command === '(') {
		$floor++;
	} else if ($command === ')') {
		$floor--;
	}

	if ($floor === -1 && $basement === FALSE) {
		$basement = $position + 1;
	}
}

echo 'current floor: ' . $floor . PHP_EOL;

if ($basement !== FALSE) {
	echo 'first entered basement: ' . $basement . PHP_EOL;
} else {
	echo 'never entered basement' . PHP_EOL;
}
