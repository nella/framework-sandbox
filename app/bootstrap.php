<?php

/**
 * My Application bootstrap file.
 */
use Nette\Application\Routers\Route;


// Load Nette Framework
require LIBS_DIR . '/Nette/loader.php';
// Load Nella Framework
require LIBS_DIR . '/Nella/loader.php';


// Configure application
$configurator = new Nella\Config\Configurator;

// Enable Nette Debugger for error visualisation & logging
//$configurator->setProductionMode($configurator::AUTO);
$configurator->enableDebugger(__DIR__ . '/../log');

// Enable RobotLoader - this will load all classes automatically
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->getSplClassLoader()
	->addAlias('Symfony', LIBS_DIR . "/Symfony")
	->addAlias('Doctrine', LIBS_DIR . "/Doctrine")

// Create Dependency Injection container from config.neon file
$configurator->addConfig(__DIR__ . '/config/config.neon');
if (file_exists($file = __DIR__ . '/config/local.neon')) {
	$configurator->addConfig(__DIR__ . '/config/local.neon');
}
$container = $configurator->createContainer();

// Setup router
$container->router[] = new Route('index.php', 'Homepage:default', Route::ONE_WAY);
$container->router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');


// Configure and run the application!
$container->application->run();
