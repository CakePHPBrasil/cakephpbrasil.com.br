<?php

namespace WebDevBr\Silex\IlluminateDatabase;

use Silex\ServiceProviderInterface;
use Silex\Application;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class ServiceProvider implements ServiceProviderInterface
{
	public function register(Application $app)
	{
		$app['db'] =  $app->share(function() use ($app) {
			$capsule = new Capsule;
			if (!isset($app['i_db.config'])) {
				throw new \InvalidArgumentException('i_db.config is required.');
			}

			$db['config'] = $app['i_db.config'];

			if (!is_array($db)) {
				throw new \InvalidArgumentException('$app[\'i_db.config\'] must is array;');
			}

			$capsule->addConnection($db['config']);

			$db['i_db.event_dispatcher'] = isset($app['i_db.event_dispatcher']) ? $app['i_db.event_dispatcher'] : true;
			$db['i_db.global'] = isset($app['i_db.global']) ? $app['i_db.global'] : true;
			$db['i_db.boot_eloquent'] = isset($app['i_db.boot_eloquent']) ? $app['i_db.boot_eloquent'] : true;

			if ($db['i_db.event_dispatcher']) {
				$capsule->setEventDispatcher(new Dispatcher(new Container));
			}

			if ($db['i_db.global']) {
				$capsule->setAsGlobal();
			}

			if ($db['i_db.event_dispatcher'] or $db['i_db.boot_eloquent']) {
				$capsule->bootEloquent();
			}

			return $capsule;
		});
	}

    public function boot(Application $app)
    {

    }
}