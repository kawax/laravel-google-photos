<?php

namespace Revolution\Google\Photos\Tests;

use Google_Service_PhotosLibrary;
use Google_Service_PhotosLibrary_Resource_Albums as Albums;
use Mockery as m;
use Revolution\Google\Photos\Photos;

class AlbumsTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();
    }

    public function testListAlbums()
    {
        $photos = m::mock(Photos::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $photos->shouldReceive('serviceAlbums->listAlbums->toSimpleObject')->andReturn('test');

        $album = $photos->listAlbums([]);

        $this->assertSame('test', $album);
    }

    public function testCreateAlbum()
    {
        $photos = m::mock(Photos::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $photos->shouldReceive('serviceAlbums->create->toSimpleObject')->andReturn('test');

        $album = $photos->createAlbum();

        $this->assertSame('test', $album);
    }

    public function testGetAlbum()
    {
        $photos = m::mock(Photos::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $photos->shouldReceive('serviceAlbums->get->toSimpleObject')->andReturn('test');

        $album = $photos->album('test');

        $this->assertSame('test', $album);
    }

    public function testServiceAlbum()
    {
        $service = m::mock(Google_Service_PhotosLibrary::class);
        $service->albums = m::mock(Albums::class);

        $photos = m::mock(Photos::class)->makePartial()->shouldAllowMockingProtectedMethods();

        $album = $photos->setService($service)->serviceAlbums();

        $this->assertInstanceOf(Albums::class, $album);
    }
}
