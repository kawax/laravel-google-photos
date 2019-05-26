<?php

namespace Tests;

use Mockery as m;

use Revolution\Google\Photos\Photos;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class UploadTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();
    }

    public function testUpload()
    {
        $res = new Response(200, [], 'test');
        $client = m::mock(Client::class);
        $client->shouldReceive('post')->once()->andReturn($res);

        $photos = m::mock(Photos::class)->makePartial();
        $photos->shouldReceive('getService->getClient->authorize')->once()->andReturn($client);

        $file = $photos->upload('name', 'file');

        $this->assertSame('test', $file);
    }
}
