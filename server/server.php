<?php

include __DIR__.'/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$command = sprintf('%s -S %s:%s -t %s',
	PHP_BINARY, getenv('SERVER_HOST'), getenv('SERVER_PORT'), getenv('SERVER_PUBLIC'));

echo sprintf('Server running in %s:%s', getenv('SERVER_HOST'), getenv('SERVER_PORT')).PHP_EOL;

passthru($command);
