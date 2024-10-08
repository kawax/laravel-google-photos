<?php

namespace Revolution\Google\Photos;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Macroable;

class PickerClient
{
    use Conditionable;
    use Macroable;

    protected string $endpoint = 'https://photospicker.googleapis.com/v1';

    protected string $token;

    public function withToken(string $access_token): static
    {
        $this->token = $access_token;

        return $this;
    }

    /**
     * sessions.create.
     *
     * @return array{id: string, pickerUri: string, pollingConfig: array{pollInterval: string, timeoutIn: string}, mediaItemsSet: bool}
     */
    public function create(): array
    {
        return Http::withToken($this->token)
            ->post($this->endpoint.'/sessions', [
                'id' => '',
            ])->json();
    }

    /**
     * sessions.get.
     *
     * @param  string  $id  SessionID
     * @return array{id: string, pickerUri: string, pollingConfig: array{pollInterval: string, timeoutIn: string}, mediaItemsSet: bool}
     */
    public function get(string $id): array
    {
        return Http::withToken($this->token)
            ->get($this->endpoint.'/sessions/'.$id)
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
            ->delete($this->endpoint.'/sessions/'.$id)
            ->json();
    }

    /**
     * mediaItems.list.
     *
     * @param  string  $id  SessionID
     * @return array{mediaItems: array, nextPageToken?: string}
     */
    public function list(string $id, ?int $pageSize = null, ?string $pageToken = null): array
    {
        return Http::withToken($this->token)
            ->get($this->endpoint.'/mediaItems', [
                'sessionId' => $id,
                'pageSize' => $pageSize,
                'pageToken' => $pageToken,
            ])
            ->json();
    }

    public function endpoint(string $endpoint): static
    {
        $this->endpoint = $endpoint;

        return $this;
    }
}
