<?php

namespace Tests;

use Mockery as m;

use Photos;
use PulkitJalan\Google\Client;

class PhotosTest extends TestCase
{
    /**
     * @var Client
     */
    protected $google;

    protected function setUp()
    {
        parent::setUp();

        $this->google = m::mock(Client::class);
        app()->instance(Client::class, $this->google);
    }

    public function tearDown()
    {
        m::close();
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
        $this->google->shouldReceive('setAccessToken')->once();
        $this->google->shouldReceive('isAccessTokenExpired')->once()->andReturns(true);
        $this->google->shouldReceive('fetchAccessTokenWithRefreshToken')->once();
        $this->google->shouldReceive('make')->once()->andReturns(m::mock(\Google_Service_PhotosLibrary::class));


        $photos = Photos::setAccessToken([
            'access_token'  => 'test',
            'refresh_token' => 'test',
        ]);

        $this->assertInstanceOf(\Google_Service_PhotosLibrary::class, $photos->getService());
    }
}
