<?php

use App\Config;

require_once 'vendor/autoload.php';

$config = new Config();

$taskNumber = $argv[1];

$callable = $config->getTaskSolutions()[$taskNumber];

$content = file_get_contents(sprintf(
    '%s/tests/Ressources/task_%s_real.txt',
    __DIR__,
    $taskNumber,
));

$input = explode("\n", $content);

var_dump($callable($input));
