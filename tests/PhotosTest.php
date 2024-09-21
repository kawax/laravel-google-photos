<?php

namespace Tests;

use Google\Photos\Library\V1\PhotosLibraryClient;
use Mockery as m;
use Revolution\Google\Photos\Facades\Photos;
use Revolution\Google\Photos\PhotosClient;

class PhotosTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();

        parent::tearDown();
    }

    public function testInstance()
    {
        $photos = new PhotosClient();

        $this->assertInstanceOf(PhotosClient::class, $photos);
    }

    public function testService()
    {
        $client = m::mock(PhotosLibraryClient::class);

        Photos::setService($client);

        $this->assertInstanceOf(PhotosLibraryClient::class, Photos::getService());
    }

    public function testWithTokenArray()
    {
        $photos = Photos::withToken([
            'client_id' => 'test',
            'client_secret' => 'test',
            'refresh_token' => 'test',
        ]);

        $this->assertInstanceOf(PhotosLibraryClient::class, $photos->getService());
    }

    public function testWithTokenString()
    {
        $photos = Photos::withToken('test');

        $this->assertInstanceOf(PhotosLibraryClient::class, $photos->getService());
    }
}
