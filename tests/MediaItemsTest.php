<?php

namespace Revolution\Google\Photos\Tests;

use Google_Service_PhotosLibrary;
use Google_Service_PhotosLibrary_Resource_MediaItems as MediaItems;
use Mockery as m;
use Revolution\Google\Photos\Photos;

class MediaItemsTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();
    }

    public function testSearch()
    {
        $photos = m::mock(Photos::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $photos->shouldReceive('serviceMediaItems->search->toSimpleObject')->andReturn((object)[]);

        $item = $photos->search([]);

        $this->assertEquals((object)[], $item);
    }

    public function testCreateMedia()
    {
        $photos = m::mock(Photos::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $photos->shouldReceive('serviceMediaItems->batchCreate->toSimpleObject')->andReturn((object)[]);

        $item = $photos->batchCreate(['token']);

        $this->assertEquals((object)[], $item);
    }

    public function testGetMedia()
    {
        $photos = m::mock(Photos::class)->makePartial()->shouldAllowMockingProtectedMethods();
        $photos->shouldReceive('serviceMediaItems->get->toSimpleObject')->andReturn((object)[]);

        $item = $photos->media('test');

        $this->assertEquals((object)[], $item);
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
