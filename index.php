<?php

require __DIR__ . '/vendor/autoload.php';

use Leaf\Blade;
use DevCycle\DevCycle;
use OneSignal\OneSignal;
use Dotenv\Dotenv; 

$dotenv = Dotenv::createImmutable(__DIR__); 
$dotenv->load();

$blade = new Blade('views', 'storage/cache');
$dc = new DevCycle($_ENV['DEVCYCLE_SERVER_SDK_KEY']);
$os = new OneSignal($_ENV['REST_API_KEY'], $_ENV['USER_AUTH_KEY']);

app()->get('/', function () use ($blade, $os) {
  echo DevCycle::ping();
  echo OneSignal::ping();
  $apps = $os->viewApps();
  echo $blade->make('index', ['name' => 'DevCycle & OneSignal', 'apps' => $apps])->render();
});

app()->run();
