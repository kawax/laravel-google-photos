<?php

namespace Revolution\Google\Photos\Concerns;

use GuzzleHttp\Exception\GuzzleException;

trait WithUploads
{
    /**
     * Returns uploadToken.
     *
     * @throws GuzzleException
     */
    public function upload(string $rawFile, string $fileName = '', string $mimeType = ''): string
    {
        return $this->getService()->upload($rawFile, $fileName, $mimeType);
    }
}
