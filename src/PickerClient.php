<?php

namespace Revolution\Google\Photos;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Macroable;

class PickerClient
{
    use Conditionable;
    use Macroable;

    protected const ENDPOINT = 'https://photospicker.googleapis.com/v1/';

    protected string $token;

    public function withToken(string $access_token): static
    {
        $this->token = $access_token;

        return $this;
    }

    /**
     * sessions.create.
     *
     * @return array PickingSession
     */
    public function create(): array
    {
        return Http::withToken($this->token)
            ->post(self::ENDPOINT.'sessions', [
                'id' => '',
            ])->json();
    }

    /**
     * sessions.get.
     *
     * @param  string  $id  SessionID
     * @return array PickingSession
     */
    public function get(string $id): array
    {
        return Http::withToken($this->token)
            ->get(self::ENDPOINT.'sessions/'.$id)
            ->json();
    }

    /**
     * sessions.delete.
     *
     * @param  string  $id  SessionID
     */
    public function delete(string $id): mixed
    {
        return Http::withToken($this->token)
            ->delete(self::ENDPOINT.'sessions/'.$id)
            ->json();
    }

    /**
     * mediaItems.list.
     *
     * @param  string  $id  SessionID
     */
    public function list(string $id, ?int $pageSize = null, ?string $pageToken = null): array
    {
        return Http::withToken($this->token)
            ->get(self::ENDPOINT.'mediaItems', [
                'sessionId' => $id,
                'pageSize' => $pageSize,
                'pageToken' => $pageToken,
            ])
            ->json();
    }
}
