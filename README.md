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
    'scopes'           => [\Google\Service\PhotosLibrary::PHOTOSLIBRARY],
    'access_type'      => 'offline',
    'approval_prompt'  => 'force',
    'prompt'           => 'consent', //"none", "consent", "select_account" default:none
```

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
GOOGLE_APPLICATION_NAME=

GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT=
```

## LICENSE
MIT  
