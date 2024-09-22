<?php

namespace Tests;

use Google\ApiCore\ApiException;
use Google\ApiCore\PagedListResponse;
use Google\Photos\Library\V1\BatchCreateMediaItemsResponse;
use Google\Photos\Library\V1\PhotosLibraryClient;
use Google\Photos\Types\MediaItem;
use Mockery as m;
use Revolution\Google\Photos\PhotosClient;

class MediaItemsTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();

        parent::tearDown();
    }

    public function test_list_media_items()
    {
        $res = m::mock(PagedListResponse::class);

        $client = m::mock(PhotosLibraryClient::class);
        $client->shouldReceive('listMediaItems')->once()->andReturn($res);

        $photos = new PhotosClient();

        $items = $photos->setService($client)->listMediaItems();

        $this->assertSame($res, $items);
    }

    public function test_search()
    {
        $res = m::mock(PagedListResponse::class);

        $client = m::mock(PhotosLibraryClient::class);
        $client->shouldReceive('searchMediaItems')->once()->andReturn($res);

        $photos = new PhotosClient();

        $items = $photos->setService($client)->search();

        $this->assertSame($res, $items);
    }

    public function test_create_media()
    {
        $res = new BatchCreateMediaItemsResponse();

        $client = m::mock(PhotosLibraryClient::class);
        $client->shouldReceive('batchCreateMediaItems')->once()->andReturn($res);

        $photos = new PhotosClient();

        $items = $photos->setService($client)->batchCreate(['token']);

        $this->assertSame($res, $items);
    }

    public function test_get_media()
    {
        $res = new MediaItem();

        $client = m::mock(PhotosLibraryClient::class);
        $client->shouldReceive('getMediaItem')->once()->andReturn($res);

        $photos = new PhotosClient();

        $items = $photos->setService($client)->getMediaItem('id');

        $this->assertSame($res, $items);
    }
}
