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

/**
 * @mixin PhotosLibraryClient
 */
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
     * mediaItems.search.
     *
     * @param  array{albumId?: string, pageSize?: int, pageToken?: string, filters?: Filters, orderBy?: string, retrySettings?: RetrySettings|array}  $optionalArgs
     *
     * @throws ApiException
     */
    public function search(array $optionalArgs = []): PagedListResponse;

    /**
     * mediaItems.batchCreate.
     *
     * @param  array<string>  $uploadTokens
     * @param  array{albumId?: string, albumPosition?: AlbumPosition, retrySettings?: RetrySettings|array}  $optionalArgs
     *
     * @throws ApiException
     */
    public function batchCreate(array $uploadTokens, array $optionalArgs = []): BatchCreateMediaItemsResponse;
}
