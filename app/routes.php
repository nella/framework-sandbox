<?php
/**
 * My Application routes file.
 *
 * @copyright  Copyright (c) 2010 John Doe
 * @package    MyApplication
 */

use Nette\Application\Routers\Route;

$router = Nette\Environment::getApplication()->getRouter();
$context = Nette\Environment::getContext();

// Homepage
$router[] = new Route("index.php", "Homepage:default", Route::ONE_WAY);


// Media
$route = $router[] = new \Nella\Media\FileRoute('<file>', "Media:Media:file");
$route->setContainer($context);
$route = $router[] = new \Nella\Media\ImageRoute('images/<format>/<image>.<type>', "Media:Media:image");
$route->setContainer($context);

// Default
$router[] = new Route("<presenter>/<action>[/<id>]", "Homepage:default");
