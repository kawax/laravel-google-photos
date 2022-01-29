# PhotosLibrary Trait
Like a Laravel Notifications.

Add `PhotosLibrary` trait to User model.

```php
<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Revolution\Google\Photos\Traits\PhotosLibrary;

class User extends Authenticatable
{
    use Notifiable;
    use PhotosLibrary;

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the Access Token
     *
     * @return string|array
     */
    protected function photosAccessToken(): array|string
    {
        return [
            'access_token'  => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'expires_in'    => $this->expires_in,
            'created'       => $this->updated_at->getTimestamp(),
        ];
    }
}
```

Add `photosAccessToken()`(abstract) for access_token.

Trait has `photos()` that returns `Photos` instance.

```php
    public function __invoke(Request $request)
    {
        // Facade
        //        $token = $request->user()->access_token;
        //
        //        Google::setAccessToken($token);
        //
        //        $albums = Photos::setService(Google::make('PhotosLibrary'))
        //                        ->listAlbums();

        // PhotosLibrary Trait
        $albums = $request->user()
                          ->photos()
                          ->listAlbums();

        $albums = $albums->albums ?? [];

        return view('albums.index')->with(compact('albums'));
    }
```

## Already photos() exists

```php
use PhotosLibrary {
    PhotosLibrary::photos as googlephotos;
}
```
