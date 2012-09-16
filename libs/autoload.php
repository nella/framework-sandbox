<?php
/**
 * This file is part of the Nella Framework (http://nellafw.org).
 *
 * Copyright (c) 2006, 2012 Patrik Votoček (http://patrik.votocek.cz)
 *
 * For the full copyright and license information,
 * please view the file LICENSE.txt that was distributed with this source code.
 */

require_once __DIR__ . '/Nette/loader.php';
require_once __DIR__ . '/Nella/loader.php';

Nella\SplClassLoader::getInstance()
	->addNamespaceAlias('Doctrine', __DIR__ . '/Doctrine')
	->addNamespaceAlias('Symfony', __DIR__ . '/Symfony');
