<?php

require __DIR__ . '/vendor/System/Application.php';
require __DIR__ . '/vendor/System/File.php';

use System\Application;
use System\File;

$app = new Application(new File(__DIR__));
$app->run();