# Google Photos API for Laravel

[![Build Status](https://travis-ci.com/kawax/laravel-google-photos.svg?branch=master)](https://travis-ci.com/kawax/laravel-google-photos)
[![Maintainability](https://api.codeclimate.com/v1/badges/ac9912fd1c3bfa21a7d3/maintainability)](https://codeclimate.com/github/kawax/laravel-google-photos/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/ac9912fd1c3bfa21a7d3/test_coverage)](https://codeclimate.com/github/kawax/laravel-google-photos/test_coverage)


https://developers.google.com/photos/

## Requirements
- PHP >= 7.3
- Laravel >= 6.0

## Versioning
- Basic : semver
- Drop old PHP or Laravel version : `+0.1`. composer should handle it well.
- Support only latest major version (`master` branch), but you can PR to old branches.

## Installation

```
composer require revolution/laravel-google-photos
```

This package depends on

- Socialite
- https://github.com/google/google-api-php-client
- https://github.com/pulkitjalan/google-apiclient

Google_Service_PhotosLibrary  
https://github.com/google/google-api-php-client-services/tree/master/src/Google/Service/PhotosLibrary

### Get API Credentials
from https://developers.google.com/console  
Enable `Photos Library API`.

### publish config file
```
php artisan vendor:publish --provider="PulkitJalan\Google\GoogleServiceProvider" --tag="config"
```

### config/google.php
```php
    'client_id'        => env('GOOGLE_CLIENT_ID', ''),
    'client_secret'    => env('GOOGLE_CLIENT_SECRET', ''),
    'redirect_uri'     => env('GOOGLE_REDIRECT', ''),
    'scopes'           => [\Google_Service_PhotosLibrary::PHOTOSLIBRARY],
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

## Demo
https://github.com/kawax/laravel-google-photos-project

## Usage
See demo project and docs.

Or another Google API Series.
- https://github.com/kawax/laravel-google-sheets
- https://github.com/kawax/laravel-google-searchconsole


## LICENSE
MIT  
Copyright kawax
