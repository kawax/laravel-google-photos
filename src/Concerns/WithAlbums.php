<?php

namespace Revolution\Google\Photos\Concerns;

use Google\ApiCore\ApiException;
use Google\ApiCore\RetrySettings;
use Google\Photos\Types\Album;

trait WithAlbums
{
    /**
     * albums.create.
     *
     * @param  array{id?: string, title?: string, cover_photo_media_item_id?: string}  $data
     * @param  array{retrySettings?: RetrySettings|array}  $optionalArgs
     *
     * @throws ApiException
     */
    public function createAlbum(array $data = [], array $optionalArgs = []): Album
    {
        $album = new Album($data);

        return $this->getService()->createAlbum($album, $optionalArgs);
    }
}
