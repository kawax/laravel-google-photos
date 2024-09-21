<?php

namespace Revolution\Google\Photos\Contracts;

use Google\ApiCore\ApiException;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\ValidationException;
use Google\Photos\Library\V1\AlbumPosition;
use Google\Photos\Library\V1\BatchCreateMediaItemsResponse;
use Google\Photos\Library\V1\Filters;
use Google\Photos\Library\V1\PhotosLibraryClient;
use Google\Photos\Types\Album;
use Google\Photos\Types\MediaItem;
use GuzzleHttp\Exception\GuzzleException;

interface Factory
{
    public function setService(PhotosLibraryClient $service): static;

    public function getService(): PhotosLibraryClient;

    /**
     * Set token.
     *
     * @param  string|array{client_id: string, client_secret: string, refresh_token: string}  $token
     *
     * @throws ValidationException
     */
    public function withToken(string|array $token): static;

    /**
     * albums.listAlbums.
     *
     * @param  array{pageSize?: integer, pageToken?: string, excludeNonAppCreatedData?: bool, retrySettings?: RetrySettings|array}  $optionalArgs
     *
     * @throws ApiException
     */
    public function listAlbums(array $optionalArgs = []): PagedListResponse;

    /**
     * albums.create.
     *
     * @param  array{retrySettings?: RetrySettings|array}  $optionalArgs
     *
     * @throws ApiException
     */
    public function createAlbum(array $data = [], array $optionalArgs = []): Album;

    /**
     * albums.get.
     *
     * @param  array{retrySettings?: RetrySettings|array}  $optionalArgs
     *
     * @throws ApiException
     */
    public function getAlbum(string $albumId, array $optionalArgs = []): Album;

    /**
     * List all media items from a user's Google Photos library.
     *
     * @param  array{pageSize?: integer, pageToken?: string, retrySettings?: RetrySettings|array}  $optionalArgs
     *
     * @throws ApiException
     */
    public function listMediaItems(array $optionalArgs = []): PagedListResponse;

    /**
     * mediaItems.search.
     *
     * @param  array{albumId?: string, pageSize?: integer, pageToken?: string, filters?: Filters, orderBy?: string, retrySettings?: RetrySettings|array}  $optionalArgs
     *
     * @throws ApiException
     */
    public function search(array $optionalArgs = []): PagedListResponse;

    /**
     * mediaItems.get.
     *
     * @param  array{retrySettings?: RetrySettings|array}  $optionalArgs
     *
     * @throws ApiException
     */
    public function getMediaItem(string $mediaItemId, array $optionalArgs = []): MediaItem;

    /**
     * mediaItems.batchCreate.
     *
     * @param  array<string>  $uploadTokens
     * @param  array{albumId?: string, albumPosition?: AlbumPosition, retrySettings?: RetrySettings|array}  $optionalArgs
     *
     * @throws ApiException
     */
    public function batchCreate(array $uploadTokens, array $optionalArgs = []): BatchCreateMediaItemsResponse;

    /**
     * Returns uploadToken.
     *
     * @throws GuzzleException
     */
    public function upload(string $rawFile, string $fileName = '', string $mimeType = ''): string;
}
