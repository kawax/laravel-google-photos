# Picker API

To handle files other than those uploaded via the API, you must use the Picker API.

- https://developers.google.com/photos/picker/guides/get-started-picker

## Picker API requires an Access Token

Get an access token from the refresh token

```php
use Revolution\Google\Photos\Support\Token;

$token = Token::toAccessToken('refresh_token');

session(['picker_token' => $token]);
```

### Mock `Token::toAccessToken()` in testing

You can use `Token::fake()` to fix the token returned by `Token::toAccessToken()`.

```php
use Revolution\Google\Photos\Support\Token;

Token::fake(token: 'test');

$token = Token::toAccessToken('refresh_token');
// test
```

Reset mock

```php
use Revolution\Google\Photos\Support\Token;

Token::fake(token: null);
```

## Session create

```php
use Revolution\Google\Photos\Facades\Picker;

$picker = Picker::withToken(session('picker_token'))->create();

session(['picker' => $picker]);

dump($picker);
// PickingSession
//[
//    'id' => '...',
//    'pickerUri' => 'https://',
//    'pollingConfig' => [],
//    'mediaItemsSet' => false,
//]
```

`pickerUri` opens a new browser and the user can select photos.

```html
<a href="{{ session('picker.pickerUri') }}" target="_blank"></a>
```

There is no way to return to the original URL from Google Photos.

## Session get
Since it does not return to the original URL, you have no choice but to check it on the Laravel side.

```php
use Revolution\Google\Photos\Facades\Picker;

$picker = Picker::withToken(session('picker_token'))->get(session('picker.id'));

session(['picker' => $picker]);

dump($picker);
// PickingSession
//[
//    'id' => '...',
//    'pickerUri' => 'https://',
//    'pollingConfig' => [],
//    'mediaItemsSet' => true,
//]
```

If `mediaItemsSet` is true, the user has finished selecting photos.

## MediaItems list

Finally, you can get a list of photos selected by the user.

```php
use Revolution\Google\Photos\Facades\Picker;

$list = Picker::withToken(session('picker_token'))->list(session('picker.id'));

dump($list);

//[
//    'mediaItems' => [],
//    'nextPageToken' => '...',
//]
```
