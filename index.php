<?php

require __DIR__ . '/vendor/autoload.php';

use Leaf\Blade;
use DevCycle\DevCycle;
use OneSignal\OneSignal;

$blade = new Blade('views', 'storage/cache');
$dc = new DevCycle();
$os = new OneSignal();

app()->get('/', function () use ($blade, $os) {
  echo DevCycle::ping();
  echo OneSignal::ping();
  $apps = $os->viewApps();
  echo $blade->make('index', ['name' => 'DevCycle & OneSignal', 'apps' => $apps])->render();
});

app()->run();
