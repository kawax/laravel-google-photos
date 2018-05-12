<?php

namespace Tests;

use Mockery as m;

use Photos;
use Google;

class PhotosTest extends TestCase
{
    //    protected function setUp()
    //    {
    //        parent::setUp();
    //    }

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
        Google::shouldReceive('make')->once()->andReturns(m::mock(\Google_Service_PhotosLibrary::class));

        Photos::setService(Google::make('PhotosLibrary'));

        $this->assertInstanceOf(\Google_Service_PhotosLibrary::class, Photos::getService());
    }
}
