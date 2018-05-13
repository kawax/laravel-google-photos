<?php

namespace Revolution\Google\Photos;

use Google_Service_PhotosLibrary;

interface PhotosInterface
{
    /**
     * albums.listAlbums
     *
     * @param array $optParams
     *
     * @return object
     */
    public function listAlbums($optParams = []);

    /**
     * albums.get
     *
     * @param string $albumId
     *
     * @return object
     */
    public function album(string $albumId);

    /**
     * mediaItems.search
     *
     * @param array $searchParams
     * @param array $optParams
     *
     * @return object
     */
    public function search($searchParams = [], $optParams = []);

    /**
     * mediaItems.get
     *
     * @param string $mediaItemId
     * @param array  $optParams
     *
     * @return object
     */
    public function media(string $mediaItemId, $optParams = []);

    /**
     * mediaItems.batchCreate
     *
     * @param array  $uploadTokens
     * @param string $albumId
     * @param array  $optParams
     *
     * @return object
     */
    public function batchCreate(array $uploadTokens, string $albumId = '', $optParams = []);

    /**
     * @param Google_Service_PhotosLibrary|\Google_Service $service
     *
     * @return $this
     */
    public function setService($service);

    /**
     * @return Google_Service_PhotosLibrary
     */
    public function getService(): Google_Service_PhotosLibrary;

    /**
     * set access_token and set new service
     *
     * @param string|array $token
     *
     * @return $this
     */
    public function setAccessToken($token);

    /**
     * sharedAlbums.listSharedAlbums
     *
     * @param array $optParams
     *
     * @return object
     */
    public function listSharedAlbums($optParams = []);

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
    ): string;
}
