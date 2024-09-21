# PhotosLibrary Trait

Add `PhotosLibrary` trait to User model.

```php
use Revolution\Google\Photos\Traits\PhotosLibrary;

class User extends Authenticatable
{
    use PhotosLibrary;

    protected function tokenForPhotoLibrary(): array|string
    {
        // Returns the refresh_token string
        return $this->refresh_token;

        // Or if you want to use a different id and secret, return an array containing the client id and secret
        return [
               'client_id' => $this->client_id,
               'client_secret' => $this->client_secret,
               'refresh_token' => $this->refresh_token,
        ];
    }
}
```

Add `tokenForPhotoLibrary()`(abstract) for token.

Trait has `photos()` that returns `Photos` instance.

```php
    public function __invoke(Request $request)
    {
        // Facade
        //        $albums = Photos::withToken($request->user()->refresh_token)
        //                        ->listAlbums();

        // PhotosLibrary Trait
        $albums = $request->user()
                          ->photos()
                          ->listAlbums();

        return view('albums.index')->with(compact('albums'));
    }
```

## Already photos() exists

```php
use PhotosLibrary {
    PhotosLibrary::photos as googlephotos;
}
```
