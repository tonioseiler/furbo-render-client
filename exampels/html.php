<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use Furbo\Renderer\HtmlRenderer;
use Furbo\Renderer\RendererExption;

try {
    $url = 'https://furbo.ch/furbo-integriert-die-unterschiedlichesten-tools';
    $renderer = new HtmlRenderer();
    $renderer->setApiKey(123);
    $html = $renderer->render($url);
    echo $html;
} catch (RendererExption $e) {
    echo $e->getMessage();
}
