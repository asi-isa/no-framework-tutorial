<?php declare(strict_types = 1);

namespace Example;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

$environment = 'development';

/**
* Register the error handler
*/
$whoops = new \Whoops\Run;
if ($environment !== 'production') {
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
} else {
    $whoops->pushHandler(function($e){
        echo 'Todo: Friendly error page and send an email to the developer';
    });
}
$whoops->register();

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

use Symfony\Component\HttpFoundation\Response;

$response = new Response(
    '<h1>Hello World</h1>',
    Response::HTTP_OK,
    ['content-type' => 'text/html']
);

$response->prepare($request);
$response->send();