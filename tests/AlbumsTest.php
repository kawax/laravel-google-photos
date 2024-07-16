<?php

namespace Tests;

use Google\Service\PhotosLibrary;
use Google\Service\PhotosLibrary\Resource\Albums;
use Mockery as m;
use Revolution\Google\Photos\PhotosClient;

class AlbumsTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();

        parent::tearDown();
    }

    public function testListAlbums()
    {
        $photos = m::mock(PhotosClient::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $photos->shouldReceive('serviceAlbums->listAlbums->toSimpleObject')->andReturn((object) []);

        $album = $photos->listAlbums([]);

        $this->assertEquals((object) [], $album);
    }

    public function testCreateAlbum()
    {
        $photos = m::mock(PhotosClient::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $photos->shouldReceive('serviceAlbums->create->toSimpleObject')->andReturn((object) []);

        $album = $photos->createAlbum();

        $this->assertEquals((object) [], $album);
    }

    public function testGetAlbum()
    {
        $photos = m::mock(PhotosClient::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $photos->shouldReceive('serviceAlbums->get->toSimpleObject')->andReturn((object) []);

        $album = $photos->album('test');

        $this->assertEquals((object) [], $album);
    }

    public function testServiceAlbum()
    {
        $service = m::mock(PhotosLibrary::class);
        $service->albums = m::mock(Albums::class);

        $photos = m::mock(PhotosClient::class)->makePartial()->shouldAllowMockingProtectedMethods();

        $album = $photos->setService($service)->serviceAlbums();

        $this->assertInstanceOf(Albums::class, $album);
    }
}
