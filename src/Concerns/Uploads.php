<?php

namespace Revolution\Google\Photos\Concerns;

use GuzzleHttp\Client;
use Psr\Http\Message\StreamInterface;

trait Uploads
{
    /**
     * Returns uploadToken
     *
     * @param  string  $name
     * @param  string|resource|StreamInterface  $file
     * @param  string  $endpoint
     *
     * @return string
     */
    public function upload(
        string $name,
        $file,
        string $endpoint = 'https://photoslibrary.googleapis.com/v1/uploads'
    ): string {
        /**
         * @var Client $client
         */
        $client = $this->getService()->getClient()->authorize();

        $response = $client->post($endpoint, [
            'headers' => [
                'Content-type'            => 'application/octet-stream',
                'X-Goog-Upload-File-Name' => $name,
            ],
            'body'    => $file,
        ]);

        return $response->getBody();
    }
}
