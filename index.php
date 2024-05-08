<?php

require __DIR__ . '/vendor/autoload.php';

use Leaf\Blade;
use DevCycle\DevCycle;
use OneSignal\OneSignal;

$blade = new Blade('views', 'storage/cache');
$dc = new DevCycle();
$os = new OneSignal();

app()->get('/', function () use ($blade) {
  echo DevCycle::ping();
  echo OneSignal::ping();
  echo $blade->make('index', ['name' => 'DevCycle & OneSignal'])->render();
});

app()->run();
