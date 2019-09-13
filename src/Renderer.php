<?php
namespace Furbo\Renderer;

use GuzzleHttp\Client;

abstract class Renderer
{

    const API_URL = 'http://localhost:8000/api/v1.0';

    protected $apiKey;
    protected $client;

    public function __construct() {
        $this->client = new Client(['verify' => false]);
    }

    public function setApiKey($key) {
        $this->apiKey = $key;
    }

}
