<?php

/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require_once __DIR__ . '/vendor/autoload.php';

$errors = 0;
if ($loader->findFile(\NewInInitializers\Foo::class) === false) {
	echo "NewInInitializers\\Foo does not exist\n";
	$errors++;
}

if ($loader->findFile(\PromotedPropertiesTypes\Foo::class) === false) {
	echo "PromotedPropertiesTypes\\Foo does not exist\n";
	$errors++;
}

if ($errors !== 0) {
	exit(1);
}

echo "Everything okay\n";
