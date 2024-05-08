<?php

namespace OneSignal;

use GuzzleHttp;
use onesignal\client\api\DefaultApi;
use onesignal\client\Configuration;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
$dotenv->load();

class OneSignal
{
  public $onesignalClient;

  function __construct()
  {
    $config = Configuration::getDefaultConfiguration()
      ->setAppKeyToken($_ENV["REST_API_KEY"])
      ->setUserKeyToken($_ENV["USER_AUTH_KEY"]);

    $this->onesignalClient = new DefaultApi(
      new GuzzleHttp\Client(),
      $config
    );
  }

  public static function ping()
  {
    return "Pong!";
  }
}
