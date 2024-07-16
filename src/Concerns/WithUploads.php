<?php

namespace Revolution\Google\Photos\Concerns;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\StreamInterface;

trait WithUploads
{
    /**
     * Returns uploadToken.
     * @throws GuzzleException
     */
    public function upload(
        string $name,
        StreamInterface|string $file,
        string $endpoint = 'https://photoslibrary.googleapis.com/v1/uploads',
    ): string {
        /**
         * @var Client $client
         */
        $client = $this->getService()->getClient()->authorize();

        $response = $client->post($endpoint, [
            'headers' => [
                'Content-type' => 'application/octet-stream',
                'X-Goog-Upload-File-Name' => $name,
            ],
            'body' => $file,
        ]);

        return $response->getBody();
    }
}
