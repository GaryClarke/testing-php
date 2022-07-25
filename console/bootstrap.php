<?php // console/bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use GuzzleHttp\Client;

require __DIR__ . '/../vendor/autoload.php';

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
//$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . '/../src'), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

// database configuration parameters
$conn = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'twitter_demo',
    'host'     => '127.0.0.1'
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

$bearerToken = "ADD YOUR OWN TOKEN HERE";

$httpClient = new Client(['headers' => ['Authorization' => $bearerToken]]);

