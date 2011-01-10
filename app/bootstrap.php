<?php

/**
 * My Application bootstrap file.
 *
 * @copyright  Copyright (c) 2011 John Doe
 * @package    App
 */


use Nette\Debug;
use Nette\Environment;
use Nette\Application\Route;


// Step 1: Load Nella Framework
// this allows load Nella Framework classes automatically so that
// you don't have to litter your code with 'require' statements
require LIBS_DIR . '/Nella/loader.php';



// Step 2: Configure environment
// 2a) enable Nette\Debug for better exception and error visualisation
Debug::enable();

// 2b) load configuration from config.ini file
Environment::loadConfig();



// Step 3: Configure application
// 3a) get and setup a front controller
$application = Environment::getApplication();
$application->errorPresenter = 'Error';
//$application->catchExceptions = TRUE;



// Step 4: Setup application router
$router = $application->getRouter();

$router[] = new Route('index.php', 'Homepage:default', Route::ONE_WAY);

$router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');



// Step 5: Run the application!
$application->run();
