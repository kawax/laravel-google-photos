# Macroable

Extend any method by your self.

## Register in AppServiceProvider.php

```php
    public function boot()
    {
        \Photos::macro('share', function ($albumId, \Google_Service_PhotosLibrary_ShareAlbumRequest $postBody, $optParams = []) {
            return $this->getService()->albums->share($albumId, $postBody, $optParams)->toSimpleObject();
        });
    }
```

## Use somewhere
```php
$response = Photos::share($albumId, $postBody);
```
