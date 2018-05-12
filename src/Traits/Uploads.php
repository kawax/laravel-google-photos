<?php

namespace Revolution\Google\Photos\Traits;

use GuzzleHttp\Client;

trait Uploads
{
    /**
     * Returns uploadToken
     *
     * @param string                                            $name
     * @param string|resource|\Psr\Http\Message\StreamInterface $file
     * @param string                                            $endpoint
     *
     * @return string
     */
    public function upload(
        string $name,
        $file,
        string $endpoint = 'https://photoslibrary.googleapis.com/v1/uploads'
    ): string {
        $token = $this->getService()->getClient()->getAccessToken();

        if (is_array($token)) {
            $token = $token['access_token'];
        }

        $response = (new Client)->post($endpoint, [
            'headers' => [
                'Content-type'            => 'application/octet-stream',
                'Authorization'           => 'Bearer ' . $token,
                'X-Goog-Upload-File-Name' => $name,
            ],
            'body'    => $file,
        ]);

        return $response->getBody();
    }
}
