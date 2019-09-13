<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use Furbo\Renderer\PdfRenderer;
use Furbo\Renderer\RendererExption;

try {
    $url = 'https://furbo.ch/furbo-integriert-die-unterschiedlichesten-tools';
    $renderer = new PdfRenderer();
    $renderer->setApiKey(123);
    $pdf = $renderer->render($url, 'exampels/tmp/'.date(time()).'.pdf');

    /*
    $pdf = $renderer->render($url);
    $pdf = $renderer->render($url, null, ['orientation' => 'landscape', 'format' => 'Letter']);
    $pdf = $renderer->render($url, 'test.pdf', ['orientation' => 'landscape', 'format' => 'Letter']);
    */

} catch (RendererExption $e) {
    echo $e->getMessage();
}
