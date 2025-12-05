<?php

use App\Config;

require_once 'vendor/autoload.php';

$config = new Config();

$taskNumber = $argv[1];

$callable = $config->getTaskSolutions()[$taskNumber];

$filePath = sprintf(
    '%s/tests/Ressources/task_%s_real.txt',
    __DIR__,
    $taskNumber,
);

if(!file_exists($filePath)) {
    echo sprintf(
        '⚠️  You need to create test file at %s ⚠️%s',
        $filePath,
        PHP_EOL
    );
    return;
}

$content = file_get_contents($filePath);

$input = explode("\n", $content);

var_dump($callable($input));
