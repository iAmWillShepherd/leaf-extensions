<?php

require __DIR__ . '/vendor/autoload.php';

use Leaf\Blade;

$blade = new Blade('views', 'storage/cache');


app()->get('/', function () use ($blade) {
    echo $blade->make('index', ['name' => 'Does it Work?'])->render();
});

app()->run();
