<?php

namespace Tests\Feature;

use Google\Photos\Library\V1\PhotosLibraryClient;
use Mockery as m;
use Revolution\Google\Photos\Facades\Photos;
use Tests\TestCase;

class UploadTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();

        parent::tearDown();
    }

    public function test_upload()
    {
        $client = m::mock(PhotosLibraryClient::class);
        $client->shouldReceive('upload')->once()->andReturn('id');

        $id = Photos::setService($client)->upload('file', 'name', 'plain/text');

        $this->assertSame('id', $id);
    }
}
