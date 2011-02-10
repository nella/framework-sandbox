<?php
/**
 * This file is part of the Nella Framework.
 *
 * Copyright (c) 2006, 2011 Patrik Votoček (http://patrik.votocek.cz)
 *
 * This source file is subject to the GNU Lesser General Public License. For more information please see http://nellacms.com
 */


use Nette\Environment;

require_once LIBS_DIR . "/Nella/loader.php";

require_once __DIR__ . "/environment.php";
Environment::loadConfig();

$application = Environment::getApplication();
//$application->errorPresenter = 'Error';
$application->catchExceptions = (bool) !Nette\Debug::$productionMode;

require_once __DIR__ . "/routes.php";

$application->run();
