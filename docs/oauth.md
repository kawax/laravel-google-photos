# OAuth by Socialite

```php
public function redirect()
{
    return Socialite::driver('google')
                    ->scopes(config('google.scopes'))
                    ->with([
                        'access_type'     => config('google.access_type'),
                        'prompt' => config('google.prompt'),
                    ])
                    ->redirect();
}

public function callback()
{
    if (request()->missing('code')) {
        return redirect('/');
    }

    /**
     * @var \Laravel\Socialite\Two\User $user
     */
    $user = Socialite::driver('google')->user();

    /**
     * @var \App\User $loginUser
     */
    $loginUser = User::updateOrCreate(
        [
            'email' => $user->email,
        ],
        [
            'name'          => $user->name,
            'refresh_token' => $user->refreshToken,
        ]);

    auth()->login($loginUser, false);

    return redirect('/home');
}
```
