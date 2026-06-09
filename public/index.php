<?php

declare(strict_types=1);

use App\Core\App;
use App\Core\Router;

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/app/bootstrap.php';

$router = new Router();
require BASE_PATH . '/routes/web.php';

App::setRouter($router);
App::run();
