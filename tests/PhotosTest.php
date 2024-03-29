<?php

namespace Revolution\Google\Photos\Tests;

use Mockery as m;
use PulkitJalan\Google\Client;
use Revolution\Google\Photos\Facades\Photos;

class PhotosTest extends TestCase
{
    /**
     * @var Client
     */
    protected $google;

    protected function setUp(): void
    {
        parent::setUp();

        $this->google = m::mock(Client::class);
        app()->instance(Client::class, $this->google);
    }

    public function tearDown(): void
    {
        m::close();

        parent::tearDown();
    }

    public function testInstance()
    {
        $photos = new \Revolution\Google\Photos\Photos();

        $this->assertInstanceOf(\Revolution\Google\Photos\Photos::class, $photos);
    }

    public function testService()
    {
        $this->google->shouldReceive('make')->once()->andReturns(m::mock(\Google_Service_PhotosLibrary::class));

        Photos::setService($this->google->make('PhotosLibrary'));

        $this->assertInstanceOf(\Google_Service_PhotosLibrary::class, Photos::getService());
    }

    public function testSetAccessToken()
    {
        $this->google->shouldReceive('getCache')->once()->andReturn(m::self());
        $this->google->shouldReceive('clear')->once();
        $this->google->shouldReceive('setAccessToken')->once();
        $this->google->shouldReceive('isAccessTokenExpired')->once()->andReturns(true);
        $this->google->shouldReceive('fetchAccessTokenWithRefreshToken')->once();
        $this->google->shouldReceive('make')->once()->andReturns(m::mock(\Google_Service_PhotosLibrary::class));

        $photos = Photos::setAccessToken([
            'access_token' => 'test',
            'refresh_token' => 'test',
        ]);

        $this->assertInstanceOf(\Google_Service_PhotosLibrary::class, $photos->getService());
    }

    public function testGetAccessToken()
    {
        $photos = m::mock(\Revolution\Google\Photos\Photos::class)->makePartial();
        $photos->shouldReceive('getService->getClient->getAccessToken')->andReturn(['token']);

        $token = $photos->getAccessToken();

        $this->assertSame(['token'], $token);
    }
}
