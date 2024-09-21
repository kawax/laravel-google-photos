# Google Photos API for Laravel

[![Build Status](https://travis-ci.com/kawax/laravel-google-photos.svg?branch=master)](https://travis-ci.com/kawax/laravel-google-photos)
[![Maintainability](https://api.codeclimate.com/v1/badges/ac9912fd1c3bfa21a7d3/maintainability)](https://codeclimate.com/github/kawax/laravel-google-photos/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/ac9912fd1c3bfa21a7d3/test_coverage)](https://codeclimate.com/github/kawax/laravel-google-photos/test_coverage)

https://developers.google.com/photos/

## Requirements
- PHP >= 8.2
- Laravel >= 11.0

## Versioning
- Basic : semver
- Drop old PHP or Laravel version : `+0.1`. composer should handle it well.
- Support only latest major version (`master` branch), but you can PR to old branches.

## Installation

```
composer require revolution/laravel-google-photos
```

### Get API Credentials
from https://developers.google.com/console  
Enable `Photos Library API`.

### config/google.php
```php
    'client_id'        => env('GOOGLE_CLIENT_ID', ''),
    'client_secret'    => env('GOOGLE_CLIENT_SECRET', ''),
    'redirect_uri'     => env('GOOGLE_REDIRECT', ''),
    'scopes'           => [
        'https://www.googleapis.com/auth/photoslibrary.appendonly',
        'https://www.googleapis.com/auth/photoslibrary.readonly.appcreateddata',
        'https://www.googleapis.com/auth/photoslibrary.edit.appcreateddata',
    ],
    'access_type'      => 'offline',
    'approval_prompt'  => 'force',
    'prompt'           => 'consent', //"none", "consent", "select_account" default:none
```

Currently, you can only access files uploaded via the API.

`'access_type' => 'offline'` is required to obtain a refresh token.

Google Photos API does not support Service Account.

### config/service.php for Socialite

```php
    'google' => [
        'client_id'     => env('GOOGLE_CLIENT_ID', ''),
        'client_secret' => env('GOOGLE_CLIENT_SECRET', ''),
        'redirect'      => env('GOOGLE_REDIRECT', ''),
    ],
```

### Configure .env as needed
```
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT=
```

## Usage example
Currently, Google Photos Library API only allows access to **files uploaded via API**, so it is difficult to use it freely.

Using it with someone else's account requires review.

It is still possible to upload one-way, so it is best to only use the **upload function to your own account**.

1. Enable the Photos Library API in the Google console and add yourself as a test user.
2. Get `refresh_token` by Socialite. Save it in the users table.
3. Upload the photo.

```php
// Command or etc

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Revolution\Google\Photos\Facades\Photos;

Photos::withToken(User::find(1)->refresh_token);

with(Photos::upload(Storage::get('test.png'), 'test.png'), function (string $id){
    Photos::batchCreate([$id]);
});
```

## LICENSE
MIT  
