<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Overtrue\LaravelSocialite\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $github_user = Socialite::driver('github')->user();

        $user = User::updateOrCreate(['email' => $github_user->email], [
            'email' => $github_user->email,
            'from_platform' => $github_user->provider,
            'name' => $github_user->username,
            'password' => '',
            'avatar' => $github_user->avatar,
            'platform_params' => $github_user->toarray(),
        ]);

        $this->guard()->login($user);

        return redirect()->intended($this->redirectPath());
    }

    public function wechatRedirectToProvider()
    {
        return Socialite::driver('wechat')->redirect();
    }

    public function weiboRedirectToProvider()
    {
        return Socialite::driver('weibo')->redirect();
    }

    public function weiboHandleProviderCallback()
    {
        $weibo_user = Socialite::driver('weibo')->user();
        $user = User::updateOrCreate(['email' => $weibo_user->email], [
            'email' => $weibo_user->email ?: '',
            'from_platform' => $weibo_user->provider,
            'name' => $weibo_user->name ?: '',
            'password' => '',
            'avatar' => $weibo_user->avatar,
            'platform_params' => $weibo_user->toarray(),
        ]);
        $this->guard()->login($user);

        return redirect()->intended($this->redirectPath());
    }

    public function weiboHandleProviderCancelCallback()
    {
        return [];
    }
}
