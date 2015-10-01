<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/config.php';

$app = new Silex\Application;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$debug = getenv('DEVELOPMENT_MODE');
$app['debug'] = 'true' === $debug;

if ($app['debug']) {
	$app->register(new Whoops\Provider\Silex\WhoopsServiceProvider);
} else {
	$app->register(new Silex\Provider\MonologServiceProvider(), array(
	    'monolog.logfile' => __DIR__.'/logs/production.log',
	));
}

$app->register(new Silex\Provider\FormServiceProvider);

$app->register(new WebDevBr\Silex\IlluminateDatabase\ServiceProvider, [
	'i_db.config'=>[
	    'driver'    => getenv('DB_DRIVER'),
	    'host'      => getenv('DB_HOST'),
	    'database'  => getenv('DB_DATABASE'),
	    'username'  => getenv('DB_USERNAME'),
	    'password'  => getenv('DB_PASSWORD'),
	    'charset'   => getenv('DB_CHARSET'),
	    'collation' => getenv('DB_COLLATION'),
	    'prefix'    => getenv('DB_PREFIX'),
	]
]);

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.messages' => array(),
));

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

require 'app.php';

$app->run();