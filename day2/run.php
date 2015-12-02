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

$presents = file($filename);
$sqft = $ft = 0;

foreach ($presents as $present) {
	// wrapping paper
	list($length, $width, $height) = array_map('intval', explode('x', $present));

	$areas = array(
		2 * $length * $width,
		2 * $width * $height,
		2 * $height * $length
	);

	$total = array_sum($areas) + (min($areas) / 2);
	$sqft += $total;

	// ribbon
	$sides = array($length, $width, $height);
	sort($sides);

	list($a, $b, ) = $sides;

	$total = (($a * 2) + ($b * 2)) + array_product($sides);
	$ft += $total;
}

echo 'square feet of wrapping paper: ' . $sqft . PHP_EOL;
echo 'feet of ribbon: ' . $ft . PHP_EOL;
