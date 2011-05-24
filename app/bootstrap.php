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

require_once LIBS_DIR . "/Nella/loader.php";

Debugger::enable(Debugger::DEVELOPMENT);

$configurator = new Nella\Configurator;
$configurator->loadConfig(__DIR__ . "/config.neon", 'development');
$context = $configurator->getContainer();

// Setup application
$application = $context->application;
//$application->errorPresenter = 'Error';
$application->catchExceptions = Debugger::$productionMode;

$application->onStartup[] = function() use($application, $context) {
	$router = $application->getRouter();

	// Homepage
	$router[] = new Route("index.php", "Homepage:default", Route::ONE_WAY);

	// Media
	$route = $router[] = new Nella\Media\FileRoute('<file>', "Media:Media:file");
	$route->setContainer($context->doctrineContainer);
	$route = $router[] = new Nella\Media\ImageRoute('images/<format>/<image>.<type>', "Media:Media:image");
	$route->setContainer($context->doctrineContainer);

	// Default
	$router[] = new Route("<presenter>/<action>[/<id>]", "Homepage:default");

};

$application->run();
