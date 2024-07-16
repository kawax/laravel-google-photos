<?php

namespace Revolution\Google\Photos\Contracts;

use Google\Service;
use Google\Service\PhotosLibrary;
use Psr\Http\Message\StreamInterface;

interface Factory
{
    /**
     * albums.listAlbums.
     */
    public function listAlbums(array $optParams = []): object;

    /**
     * albums.create.
     */
    public function createAlbum(array $createParams = ['isWriteable' => true], array $optParams = []): object;

    /**
     * albums.get.
     */
    public function album(string $albumId): object;

    /**
     * mediaItems.search.
     */
    public function search(array $searchParams = [], array $optParams = []): object;

    /**
     * mediaItems.get.
     */
    public function media(string $mediaItemId, array $optParams = []): object;

    /**
     * mediaItems.batchCreate.
     */
    public function batchCreate(array $uploadTokens, string $albumId = '', array $optParams = []): object;

    public function setService(PhotosLibrary|Service $service): static;

    public function getService(): PhotosLibrary;

    /**
     * set access_token and set new service.
     */
    public function setAccessToken(array|string $token): static;

    /**
     * sharedAlbums.listSharedAlbums.
     */
    public function listSharedAlbums(array $optParams = []): object;

    /**
     * Returns uploadToken.
     */
    public function upload(
        string $name,
        StreamInterface|string $file,
        string $endpoint = 'https://photoslibrary.googleapis.com/v1/uploads',
    ): string;
}
