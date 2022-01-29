<?php

namespace Revolution\Google\Photos\Contracts;

use Google\Service;
use Google\Service\PhotosLibrary;
use Psr\Http\Message\StreamInterface;

interface Factory
{
    /**
     * albums.listAlbums.
     *
     * @param  array  $optParams
     *
     * @return object
     */
    public function listAlbums(array $optParams = []): object;

    /**
     * albums.create.
     *
     * @param  array  $createParams
     * @param  array  $optParams
     *
     * @return object
     */
    public function createAlbum(array $createParams = ['isWriteable' => true], array $optParams = []): object;

    /**
     * albums.get.
     *
     * @param  string  $albumId
     *
     * @return object
     */
    public function album(string $albumId): object;

    /**
     * mediaItems.search.
     *
     * @param  array  $searchParams
     * @param  array  $optParams
     *
     * @return object
     */
    public function search(array $searchParams = [], array $optParams = []): object;

    /**
     * mediaItems.get.
     *
     * @param  string  $mediaItemId
     * @param  array  $optParams
     *
     * @return object
     */
    public function media(string $mediaItemId, array $optParams = []): object;

    /**
     * mediaItems.batchCreate.
     *
     * @param  array  $uploadTokens
     * @param  string  $albumId
     * @param  array  $optParams
     *
     * @return object
     */
    public function batchCreate(array $uploadTokens, string $albumId = '', array $optParams = []): object;

    /**
     * @param  PhotosLibrary|Service  $service
     *
     * @return $this
     */
    public function setService(PhotosLibrary|Service $service): self;

    /**
     * @return PhotosLibrary
     */
    public function getService(): PhotosLibrary;

    /**
     * set access_token and set new service.
     *
     * @param  array|string  $token
     *
     * @return $this
     */
    public function setAccessToken(array|string $token): self;

    /**
     * sharedAlbums.listSharedAlbums.
     *
     * @param  array  $optParams
     *
     * @return object
     */
    public function listSharedAlbums(array $optParams = []): object;

    /**
     * Returns uploadToken.
     *
     * @param  string  $name
     * @param  StreamInterface|string  $file
     * @param  string  $endpoint
     *
     * @return string
     */
    public function upload(
        string $name,
        StreamInterface|string $file,
        string $endpoint = 'https://photoslibrary.googleapis.com/v1/uploads'
    ): string;
}
