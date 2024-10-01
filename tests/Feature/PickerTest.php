<?php

namespace Tests\Feature;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Revolution\Google\Photos\Facades\Picker;
use Revolution\Google\Photos\Support\Token;
use Tests\TestCase;

class PickerTest extends TestCase
{
    public function test_create()
    {
        Http::fake(fn () => Http::response(['id' => 'test', 'pickerUri' => 'https://']));

        $res = Picker::withToken('token')->create();

        $this->assertSame('test', $res['id']);

        Http::assertSent(function (Request $request) {
            return $request->url() === 'https://photospicker.googleapis.com/v1/sessions';
        });
    }

    public function test_get()
    {
        Http::fake(fn () => Http::response(['id' => 'test', 'pickerUri' => 'https://']));

        $res = Picker::withToken('token')->get('test');

        $this->assertSame('test', $res['id']);

        Http::assertSent(function (Request $request) {
            return $request->url() === 'https://photospicker.googleapis.com/v1/sessions/test';
        });
    }

    public function test_delete()
    {
        Http::fake(fn () => Http::response([]));

        $res = Picker::withToken('token')->delete('test');

        $this->assertSame([], $res);

        Http::assertSent(function (Request $request) {
            return $request->url() === 'https://photospicker.googleapis.com/v1/sessions/test';
        });
    }

    public function test_list()
    {
        Http::fake(fn () => Http::response(['mediaItems' => [], 'nextPageToken' => 'next']));

        $res = Picker::withToken('token')->list(id: 'test');

        $this->assertSame('next', $res['nextPageToken']);

        Http::assertSent(function (Request $request) {
            return $request->url() === 'https://photospicker.googleapis.com/v1/mediaItems?sessionId=test';
        });
    }

    public function test_endpoint()
    {
        Http::fake(fn () => Http::response([]));

        $res = Picker::withToken('token')->endpoint('https://example.com/v1')->create();

        Http::assertSent(function (Request $request) {
            return $request->url() === 'https://example.com/v1/sessions';
        });
    }

    public function test_token_fake()
    {
        Token::fake(token: 'test');

        $token = Token::toAccessToken('token');

        Token::fake(token: null);

        $this->assertSame('test', $token);
    }
}
