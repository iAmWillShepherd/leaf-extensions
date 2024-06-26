<?php

require __DIR__ . '/vendor/autoload.php';

use Leaf\Blade;
use DevCycle\DevCycle;
use OneSignal\OneSignal;
use Dotenv\Dotenv;
use onesignal\client\model\Notification;
use onesignal\client\model\StringMap;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$blade = new Blade('views', 'storage/cache');
$dc = new DevCycle($_ENV['DEVCYCLE_SERVER_SDK_KEY']);
$os = new OneSignal($_ENV['REST_API_KEY'], $_ENV['USER_AUTH_KEY']);

app()->get('/', function () use ($blade, $os) {
 $apps = $os->viewApps();
 echo $blade->make('index', ['name' => 'DevCycle & OneSignal', 'apps' => $apps])->render();
});

app()->post('/test', function () use ($os) {
    $appId = $_POST["appId"];
    $message = $_POST["message"];
    $notification = new Notification();
    $notification->setAppId($appId);
    $m = new StringMap();
    $m->setEn($message);
    $notification->setContents($m);

    $notification->setIncludedSegments(['Total Subscriptions']);

    $client = $os->getClient();
    $client->createNotification($notification);

});

app()->run();
