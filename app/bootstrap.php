<?php
/**
 * This file is part of the Nella Framework.
 *
 * Copyright (c) 2006, 2011 Patrik Votoček (http://patrik.votocek.cz)
 *
 * This source file is subject to the GNU Lesser General Public License. For more information please see http://nella-project.org
 */


use Nette\Diagnostics\Debugger,
	Nette\Application\Routers\Route;

require_once $params['libsDir'] . "/Nella/loader.php";

// Setup debugger
Debugger::$logDirectory = $params['rootDir'] . '/log';
Debugger::enable();

// Load configurations
$configurator = new Nella\Configurator($params);
$context = $configurator->loadConfig();


// Setup application
$application = $context->application;
//$application->errorPresenter = 'Error';
$application->catchExceptions = Debugger::$productionMode;

// Router
$router = $application->router;
// Homepage
$router[] = new Route("index.php", "Homepage:default", Route::ONE_WAY);
// Media
$route = $router[] = new Nella\Media\FileRoute(
	'files/<file>', "Media:Media:file", 0, $context->doctrineContainer
);
$route = $router[] = new Nella\Media\ImageRoute(
	'images/<format>/<image>.<type>', "Media:Media:image", 0, $context->doctrineContainer
);
// Default
$router[] = new Route("<presenter>/<action>[/<id>]", "Homepage:default");


$application->run();
