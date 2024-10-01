<?php

namespace Tests\Feature;

use Mockery as m;
use Revolution\Google\Photos\Facades\Photos;
use Revolution\Google\Photos\Traits\PhotosLibrary;
use Tests\TestCase;

class TraitTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();

        parent::tearDown();
    }

    public function test_trait()
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
