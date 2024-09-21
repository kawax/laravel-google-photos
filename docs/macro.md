# Macroable

Extend any method by your self.

## Register in AppServiceProvider.php

```php
use Revolution\Google\Photos\Facades\Photos;
use Google\Photos\Types\MediaItem;

    public function boot()
    {
        Photos::macro('updateMediaItemDescription', function (string $mediaItemId, string $newDescription, array $optionalArgs = []): MediaItem {
            return $this->getService()->updateMediaItemDescription($mediaItemId, $newDescription, $optionalArgs);
        });
    }
```

## Use somewhere
```php
use Revolution\Google\Photos\Facades\Photos;

$item = Photos::updateMediaItemDescription($mediaItemId, $newDescription);
```
