<?php

namespace Tests;

use Google\Service\PhotosLibrary;
use Google\Service\PhotosLibrary\Resource\MediaItems;
use Mockery as m;
use Revolution\Google\Photos\PhotosClient;

class MediaItemsTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();

        parent::tearDown();
    }

    public function testSearch()
    {
        $photos = m::mock(PhotosClient::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $photos->shouldReceive('serviceMediaItems->search->toSimpleObject')->andReturn((object) []);

        $item = $photos->search([]);

        $this->assertEquals((object) [], $item);
    }

    public function testCreateMedia()
    {
        $photos = m::mock(PhotosClient::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $photos->shouldReceive('serviceMediaItems->batchCreate->toSimpleObject')->andReturn((object) []);

        $item = $photos->batchCreate(['token']);

        $this->assertEquals((object) [], $item);
    }

    public function testGetMedia()
    {
        $photos = m::mock(PhotosClient::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $photos->shouldReceive('serviceMediaItems->get->toSimpleObject')->andReturn((object) []);

        $item = $photos->media('test');

        $this->assertEquals((object) [], $item);
    }

    public function testServiceMedia()
    {
        $service = m::mock(PhotosLibrary::class);
        $service->mediaItems = m::mock(MediaItems::class);

        $photos = m::mock(PhotosClient::class)->makePartial()->shouldAllowMockingProtectedMethods();

        $item = $photos->setService($service)->serviceMediaItems();

        $this->assertInstanceOf(MediaItems::class, $item);
    }
}
