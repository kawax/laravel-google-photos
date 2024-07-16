<?php

namespace Tests;

use Google\Service\PhotosLibrary;
use Google\Service\PhotosLibrary\Resource\SharedAlbums;
use Mockery as m;
use Revolution\Google\Photos\PhotosClient;

class SharedAlbumsTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();

        parent::tearDown();
    }

    public function testShared()
    {
        $shared = m::mock(SharedAlbums::class);
        $shared->shouldReceive('listSharedAlbums->toSimpleObject')->once()->andReturn((object) []);

        $service = m::mock(PhotosLibrary::class);
        $service->sharedAlbums = $shared;

        $photos = m::mock(PhotosClient::class)->makePartial();

        $album = $photos->setService($service)->listSharedAlbums([]);

        $this->assertEquals((object) [], $album);
    }
}
