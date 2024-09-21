<?php

namespace Tests;

use Google\Photos\Library\V1\PhotosLibraryClient;
use Mockery as m;
use Revolution\Google\Photos\Facades\Photos;

class UploadTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();

        parent::tearDown();
    }

    public function testUpload()
    {
        $client = m::mock(PhotosLibraryClient::class);
        $client->shouldReceive('upload')->once()->andReturn('id');

        $id = Photos::setService($client)->upload('file', 'name', 'plain/text');

        $this->assertSame('id', $id);
    }
}
