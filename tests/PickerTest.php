<?php

namespace Tests;

use Illuminate\Support\Facades\Http;

use Revolution\Google\Photos\Facades\Picker;

class PickerTest extends TestCase
{
    public function test_create()
    {
        Http::fake(fn () => Http::response(['id' => 'test', 'pickerUri' => 'https://']));

        $res = Picker::withToken('token')->create();

        $this->assertSame('test', $res['id']);
    }

    public function test_get()
    {
        Http::fake(fn () => Http::response(['id' => 'test', 'pickerUri' => 'https://']));

        $res = Picker::withToken('token')->get('test');

        $this->assertSame('test', $res['id']);
    }

    public function test_delete()
    {
        Http::fake(fn () => Http::response([]));

        $res = Picker::withToken('token')->delete('test');

        $this->assertSame([], $res);
    }

    public function test_list()
    {
        Http::fake(fn () => Http::response(['mediaItems' => [], 'nextPageToken' => 'next']));

        $res = Picker::withToken('token')->list(id: 'test');

        $this->assertSame('next', $res['nextPageToken']);
    }
}
