<?php
/**
 * My Application routes file.
 *
 * @copyright  Copyright (c) 2010 John Doe
 * @package    MyApplication
 */

use Nette\Application\Routers\Route;

$router = Nette\Environment::getApplication()->getRouter();

// Homepage
$router[] = new Route("index.php", "Homepage:default", Route::ONE_WAY);


// Media
$route = new \Nella\Media\FileRoute('<file>', "Media:Media:file");
$router[] = $route->setEntityManager($em);
$route = new \Nella\Media\ImageRoute('images/<format>/<image>.<type>', "Media:Media:image");
$router[] = $route->setEntityManager($em);

// Default
$router[] = new Route("<presenter>/<action>[/<id>]", "Homepage:default");
