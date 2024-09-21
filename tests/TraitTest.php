<?php

namespace Tests;

use Mockery as m;
use Revolution\Google\Photos\Facades\Photos;
use Revolution\Google\Photos\Traits\PhotosLibrary;

class TraitTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();

        parent::tearDown();
    }

    public function testTrait()
    {
        Photos::shouldReceive('withToken')->with('test')->once()->andReturn(m::self());

        $photos = (new User())->photos();

        $this->assertNotNull($photos);
    }
}

class User
{
    use PhotosLibrary;

    public function tokenForPhotoLibrary(): array|string
    {
        return 'test';
    }
}
