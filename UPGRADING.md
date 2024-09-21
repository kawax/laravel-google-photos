# UPGRADING

## from 5.x to 6.0
Contains many breaking changes due to major changes to the Photos API.  
https://developers.googleblog.com/en/google-photos-picker-api-launch-and-library-api-updates/

- Dependent package changed to `google/photos-library`.
- PhotosClient: Renamed from `setAccessToken()` to `withToken()`. Pass `refresh_token` to withToken.
- PhotosLibrary trait: Renamed from `photosAccessToken()` to `tokenForPhotoLibrary()`.
- Many method arguments and return values have been changed.
- `config/google.php` is still used.
- share: Deleted.

> you can only access and manage content that was created by your application.
> https://developers.google.com/photos/library/guides/get-started-library
