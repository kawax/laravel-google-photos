<?php

namespace Revolution\Google\Photos\Support;

use Google\Auth\Credentials\UserRefreshCredentials;

class Token
{
    /**
     * @param  string|array{client_id: string, client_secret: string, refresh_token: string}  $refresh_token
     *
     * @return string access_token
     *
     * @codeCoverageIgnore
     */
    public static function toAccessToken(string|array $refresh_token): string
    {
        $refresh_token = self::refreshArray($refresh_token);

        $credentials = new UserRefreshCredentials(config('google.scopes'), $refresh_token);

        return $credentials->fetchAuthToken()['access_token'] ?? '';
    }

    /**
     * @param  string|array{client_id: string, client_secret: string, refresh_token: string}  $refresh_token
     */
    public static function refreshArray(string|array $refresh_token): array
    {
        if (is_string($refresh_token)) {
            $refresh_token = [
                'client_id' => config('google.client_id'),
                'client_secret' => config('google.client_secret'),
                'refresh_token' => $refresh_token,
            ];
        }

        return $refresh_token;
    }
}
