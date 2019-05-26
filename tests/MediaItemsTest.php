<?php

namespace Tests;

use Mockery as m;

use Revolution\Google\Photos\Photos;

use Google_Service_PhotosLibrary;
use Google_Service_PhotosLibrary_Resource_MediaItems as MediaItems;

class MediaItemsTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();
    }

    public function testSearch()
    {
        $photos = m::mock(Photos::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $photos->shouldReceive('serviceMediaItems->search->toSimpleObject')->andReturn('test');

        $item = $photos->search([]);

        $this->assertSame('test', $item);
    }

    public function testCreateMedia()
    {
        $photos = m::mock(Photos::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $photos->shouldReceive('serviceMediaItems->batchCreate->toSimpleObject')->andReturn('test');

        $item = $photos->batchCreate(['token']);

        $this->assertSame('test', $item);
    }

    public function testGetMedia()
    {
        $photos = m::mock(Photos::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $photos->shouldReceive('serviceMediaItems->get->toSimpleObject')->andReturn('test');

        $item = $photos->media('test');

        $this->assertSame('test', $item);
    }

    public function testServiceMedia()
    {
        $service = m::mock(Google_Service_PhotosLibrary::class);
        $service->mediaItems = m::mock(MediaItems::class);

        $photos = m::mock(Photos::class)->makePartial()->shouldAllowMockingProtectedMethods();

        $item = $photos->setService($service)->serviceMediaItems();

        $this->assertInstanceOf(MediaItems::class, $item);
    }
}
