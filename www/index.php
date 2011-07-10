<?php

$params = array();

// the identification of this application
$params['appName'] = "Nella Application Skeleton";

// absolute filesystem path to the root dir
$params['rootDir'] = __DIR__ . "/..";

// absolute filesystem path to the web root
$params['wwwDir'] = __DIR__;

// absolute filesystem path to the application root
$params['appDir'] = $params['rootDir'] . "/app";

// absolute filesystem path to the libraries
$params['libsDir'] = $params['rootDir'] . "/libs";

// absolute filesystem path to the temporary files
$params['tempDir'] = $params['rootDir'] . "/temp";

// absolute filesystem path to the uploaded files
$params['storageDir'] = $params['appDir'] . "/storage";

// load bootstrap file
require $params['appDir'] . '/bootstrap.php';
