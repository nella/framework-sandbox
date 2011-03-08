<?php
/**
 * My Application routes file.
 *
 * @copyright  Copyright (c) 2010 John Doe
 * @package    MyApplication
 */

use Nette\Application\Route;

$router = Nette\Environment::getApplication()->getRouter();

$router[] = new Route("index.php", "Homepage:default", Route::ONE_WAY);
$router[] = new Route("<presenter>/<action>[/<id>]", "Homepage:default");
