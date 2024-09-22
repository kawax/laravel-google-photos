<?php

namespace Tests;

use Google\ApiCore\PagedListResponse;
use Google\Photos\Library\V1\PhotosLibraryClient;
use Google\Photos\Types\Album;
use Mockery as m;
use Revolution\Google\Photos\PhotosClient;

class AlbumsTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();

        parent::tearDown();
    }

    public function test_list_albums()
    {
        $res = m::mock(PagedListResponse::class);

        $client = m::mock(PhotosLibraryClient::class);
        $client->shouldReceive('listAlbums')->once()->andReturn($res);

        $photos = new PhotosClient();

        $album = $photos->setService($client)->listAlbums();

        $this->assertSame($res, $album);
    }

    public function test_create_album()
    {
        $res = new Album();
        $res->setTitle('title');

        $client = m::mock(PhotosLibraryClient::class);
        $client->shouldReceive('createAlbum')->once()->andReturn($res);

        $photos = new PhotosClient();

        $album = $photos->setService($client)->createAlbum(['title' => 'title']);

        $this->assertSame('title', $album->getTitle());
    }

    public function test_get_album()
    {
        $res = new Album();
        $res->setTitle('title');

        $client = m::mock(PhotosLibraryClient::class);
        $client->shouldReceive('getAlbum')->once()->andReturn($res);

        $photos = new PhotosClient();

        $album = $photos->setService($client)->getAlbum('1');

        $this->assertSame('title', $album->getTitle());
    }
}
