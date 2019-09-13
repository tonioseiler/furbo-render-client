<?php
namespace Furbo\Renderer;

class HtmlRenderer extends Renderer
{

    public function __construct() {
        parent::__construct();
    }

    public function render($url)
    {
        try {
            $response = $this->client->request('POST', parent::API_URL.'/html', [
                'form_params' => [
                    'url' => $url,
                    'api_key' => $this->apiKey
                ]
            ]);
            $data = json_decode((string) $response->getBody());
            if ($data->error) {
                throw new RendererExption($data->message, $data->error);
            }
            return $data->content;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $responseBody = $e->getResponse()->getBody(true);
            throw new RendererExption('Could not render '.$url.' - '.$responseBody);
        }

    }
}
