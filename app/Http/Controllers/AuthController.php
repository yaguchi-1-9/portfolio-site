<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\TempRegisteredUser;
use App\Models\RegisteredUser;
use Illuminate\Support\Str;
use App\Mail\VerifyEmail;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * 新規登録フォームを表示
     *
     * @return void
     */
    public function showRegistrationForm() : View
    {
        return view('auth.register');
    }

    /**
     * 新規登録処理
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request) 
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        $tempUser = TempRegisteredUser::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'token' => Str::random(60),
        ]);

        // 登録したユーザーに確認メールを送信
        Mail::to($tempUser->email)->send(new VerifyEmail($tempUser));

        return redirect('login')->with('status', '認証メールを送信しました。');
    }

    public function verify($token) : void
    {
        $tempUser = TempRegisteredUser::where('token', $token)->firstOrFail();

        RegisteredUser::create([
            'email' => $tempUser->email,
            'password' => $tempUser->password,
        ]);
    }

    // ログインフォームを表示
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ログイン処理
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('blog.index');
        }

        return back()->withErrors([
            'email' => 'メールアドレスかパスワードが間違っています。',
        ]);
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/blog.index');
    }
}
