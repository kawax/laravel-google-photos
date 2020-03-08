<?php

namespace Revolution\Google\Photos\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Mockery as m;
use Revolution\Google\Photos\Photos;

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
