<?php

namespace Revolution\Google\Photos\Concerns;

use Google\ApiCore\ApiException;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\RetrySettings;
use Google\Photos\Types\Album;

trait WithAlbums
{
    /**
     * albums.listAlbums.
     *
     * @param  array{pageSize?: integer, pageToken?: string, excludeNonAppCreatedData?: bool, retrySettings?: RetrySettings|array}  $optionalArgs
     *
     * @throws ApiException
     */
    public function listAlbums(array $optionalArgs = []): PagedListResponse
    {
        return $this->getService()->listAlbums($optionalArgs);
    }

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

    /**
     * albums.get.
     *
     * @param  array{retrySettings?: RetrySettings|array}  $optionalArgs
     *
     * @throws ApiException
     */
    public function album(string $albumId, array $optionalArgs = []): Album
    {
        return $this->getService()->getAlbum($albumId, $optionalArgs);
    }
}
