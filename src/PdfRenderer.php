<?php
namespace Furbo\Renderer;

class PdfRenderer extends Renderer
{

    public function __construct() {
        parent::__construct();
    }

    public function render($url, $file = null, $options = [])
    {
        try {

            $params = [
                'url' => $url,
                'api_key' => $this->apiKey
            ];

            if (isset($options['orientation']))
                $params['orientation'] = $options['orientation'];

            if (isset($options['format']))
                $params['format'] = $options['format'];

            $response = $this->client->request('POST', parent::API_URL.'/pdf', [
                'form_params' => $params
            ]);
            $data = json_decode((string) $response->getBody());
            if ($data->error) {
                throw new RendererExption($data->message, $data->error);
            }

            $pdfUrl = $data->pdf;
            $response = $this->client->request('GET', $pdfUrl);
            $pdf = $response->getBody()->getContents();

            if (!empty($file)) {
                //save file to disk
                file_put_contents($file, $pdf);
                return $file;
            } else {
                //return buffer
                return $pdf;
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $responseBody = $e->getResponse()->getBody(true);
            throw new RendererExption('Could not render '.$url.' - '.$responseBody);
        }

    }
}
