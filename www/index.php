<?php

// the identification of this site
define('SITE', 'Nella Application Skeleton');

// absolute filesystem path to the web root
define('WWW_DIR', __DIR__);

// absolute filesystem path to the application root
define('APP_DIR', WWW_DIR . '/../app');

// absolute filesystem path to the libraries
define('LIBS_DIR', WWW_DIR . '/../libs');

// absolute filesystem path to the temporary files
define('TEMP_DIR', WWW_DIR . '/../temp');

// absolute filesystem path to the uploaded files
define('STORAGE_DIR', APP_DIR . '/storage');

// absolute filesystem path to the public image cache files
define('IMAGE_CACHE_DIR', WWW_DIR . '/images');

// load bootstrap file
require APP_DIR . '/bootstrap.php';
