<?php
namespace Furbo\Renderer;

use GuzzleHttp\Client;

abstract class Renderer
{

    const API_URL = 'https://render.furbo.ch/api/v1.0';

    protected $apiKey;
    protected $client;

    public function __construct() {
        $this->client = new Client(['verify' => false]);
    }

    public function setApiKey($key) {
        $this->apiKey = $key;
    }

}
