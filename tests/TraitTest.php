<?php

namespace Revolution\Google\Photos\Tests;

use Mockery as m;
use Revolution\Google\Photos\Facades\Photos;
use Revolution\Google\Photos\Traits\PhotosLibrary;

class TraitTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();
    }

    public function testTrait()
    {
        Photos::shouldReceive('setAccessToken')->with('test')->once()->andReturn(m::self());

        $photos = (new User())->photos();

        $this->assertNotNull($photos);
    }
}

class User
{
    use PhotosLibrary;

    public function photosAccessToken(): array|string
    {
        return 'test';
    }
}
