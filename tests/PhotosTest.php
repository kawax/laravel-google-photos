<?php

namespace Tests;

use Google\Service\PhotosLibrary;
use Mockery as m;
use Revolution\Google\Client\GoogleApiClient;
use Revolution\Google\Photos\Facades\Photos;
use Revolution\Google\Photos\PhotosClient;

class PhotosTest extends TestCase
{
    protected GoogleApiClient $google;

    protected function setUp(): void
    {
        parent::setUp();

        $this->google = m::mock(GoogleApiClient::class);
        app()->instance(GoogleApiClient::class, $this->google);
    }

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
        $this->google->shouldReceive('make')->once()->andReturns(m::mock(PhotosLibrary::class));

        Photos::setService($this->google->make('PhotosLibrary'));

        $this->assertInstanceOf(PhotosLibrary::class, Photos::getService());
    }

    public function testSetAccessToken()
    {
        $this->google->shouldReceive('getCache')->once()->andReturn(m::self());
        $this->google->shouldReceive('clear')->once();
        $this->google->shouldReceive('setAccessToken')->once();
        $this->google->shouldReceive('isAccessTokenExpired')->once()->andReturns(true);
        $this->google->shouldReceive('fetchAccessTokenWithRefreshToken')->once();
        $this->google->shouldReceive('make')->once()->andReturns(m::mock(PhotosLibrary::class));

        $photos = Photos::setAccessToken([
            'access_token' => 'test',
            'refresh_token' => 'test',
        ]);

        $this->assertInstanceOf(PhotosLibrary::class, $photos->getService());
    }

    public function testGetAccessToken()
    {
        $photos = m::mock(PhotosClient::class)->makePartial();
        $photos->shouldReceive('getService->getClient->getAccessToken')->andReturn(['token']);

        $token = $photos->getAccessToken();

        $this->assertSame(['token'], $token);
    }
}
