<?php 
require_once __DIR__.'/../vendor/autoload.php';
/*require_once __DIR__.'/../front/rectangles.php';*/

use Silex\Application as App;

const DB_HOST = 'localhost';
const DB_DATABASE = 'labyrinthe';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Symfony\Component\Validator\Constraints as Assert;

$app = new Application();

$app['debug'] = true;

$app->register(new Silex\Provider\ValidatorServiceProvider());

$app['database.config'] = [
        'dsn'      => 'mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE,
        'username' => 'root',
        'password' => '',
        'options'  => [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // flux en utf8
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // mysql erreurs remontées sous forme d'exception
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // tous les fetch en objets
        ]
  
];

function create(request $request){
$im = imagecreatetruecolor(55, 30);
$dim = [
	`case`	  => $request->request->get(`case`),
	'ligne'	  => $request->request->get('ligne'),
	'couleur' => $request->request->get('couleur'),
	$request  =>'case','ligne'->get('execute'),
	imagerectangle($im, 'case', 'case', 'ligne', 'ligne', 'couleur'),
	imagerectangle($im, 45, 60, 120, 100, 'couleur'),
	imagerectangle($im, 4, 4, 50, 75, 'couleur'),

	];
};

$app->register(new TwigServiceProvider(), [
        'twig.path' => __DIR__ . '/../views',
]);

$app->get('/', function (request $request) use ($app) {

	return $app['twig']->render('front/home.twig');

});

$app->post('/create', 'fontComtrolleur:index');


$app->run();