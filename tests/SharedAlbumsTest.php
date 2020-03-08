<?php

namespace Revolution\Google\Photos\Tests;

use Google_Service_PhotosLibrary;
use Google_Service_PhotosLibrary_Resource_SharedAlbums as SharedAlbums;
use Mockery as m;
use Revolution\Google\Photos\Photos;

class SharedAlbumsTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();
    }

    public function testShared()
    {
        $shared = m::mock(SharedAlbums::class);
        $shared->shouldReceive('listSharedAlbums->toSimpleObject')->once()->andReturn('test');

        $service = m::mock(Google_Service_PhotosLibrary::class);
        $service->sharedAlbums = $shared;

        $photos = m::mock(Photos::class)->makePartial();

        $album = $photos->setService($service)->listSharedAlbums([]);

        $this->assertSame('test', $album);
    }
}
