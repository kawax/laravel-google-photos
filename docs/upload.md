# Upload

- https://developers.google.com/photos/library/guides/upload-media
- https://developers.google.com/photos/library/guides/api-limits-quotas#photo-storage-quality

## two-step process
1. Upload file.
2. Add to mediaItems by batchCreate.

```php
use Illuminate\Http\Request;

public function __invoke(Request $request)
{
    if (!$request->hasFile('file')) {
        return redirect('home');
    }

    $photos = $request->user()->photos();

    $file = $request->file('file');

    $uploadToken = $photos->upload(
        $file->getContent(),
        $file->getClientOriginalName(),
    );

    $result = $photos->batchCreate([$uploadToken]);

    return redirect('home')->with('status', 'Upload success');
}
```
