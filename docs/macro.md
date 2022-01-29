# Macroable

Extend any method by your self.

## Register in AppServiceProvider.php

```php
use Revolution\Google\Photos\Facades\Photos;
use Google\Service\PhotosLibrary\ShareAlbumRequest;

    public function boot()
    {
        Photos::macro('share', function ($albumId, ShareAlbumRequest $postBody, $optParams = []) {
            return $this->getService()->albums->share($albumId, $postBody, $optParams)->toSimpleObject();
        });
    }
```

## Use somewhere
```php
$response = Photos::share($albumId, $postBody);
```
