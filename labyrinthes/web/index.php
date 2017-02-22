<?php 
require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application as App;

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
$app = new Application();

$app['debug'] = true;


$app->register(new TwigServiceProvider(), [
        'twig.path' => __DIR__ . '/../views',
]);

$app->get('/', function () use ($app) {

	return $app['twig']->render('front/home.twig');

});

$app->post('/create', 'fontComtrolleur:index');


$app->run();