<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * OAuthプロバイダへリダイレクトする
     *
     * @return RedirectResponse
     */
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->with(['prompt' => 'select_account'])->redirect();
    }

    /**
     * OAuthプロバイダからのコールバックを処理する
     *
     * @return RedirectResponse
     */
    public function handleGoogleCallback(): RedirectResponse
    {
        $googleUser = Socialite::driver('google')->user();

        // 許可するドメインをここに記述する
        $allowedEmailDomains = ['example.com', 'example.co.jp'];

        $userEmailDomain = substr(strrchr($googleUser->getEmail(), "@"), 1);

        if (!in_array($userEmailDomain, $allowedEmailDomains)) {
            return redirect()->route('login.fail');
        }

        $user = User::updateOrCreate([
            'google_id' => $googleUser->getId(),
        ], [
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'avatar' => $googleUser->getAvatar(),
        ]);

        Auth::login($user);
        return redirect()->route('user.index');
    }

    /**
     * ログイン失敗時の画面を表示する
     *
     * @return View
     */
    public function failLogin(): View
    {
        return view('login.fail');
    }

    /**
     * ログアウトする
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
