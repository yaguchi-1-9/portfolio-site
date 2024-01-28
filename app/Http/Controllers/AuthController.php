<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\TempRegisteredUser;
use App\Models\RegisteredUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // 新規登録フォームを表示
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // 新規登録処理
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

        // 本人確認メールの送信
        Mail::send('emails.verify', ['token' => $tempUser->token], function ($message) use ($tempUser) {
            $message->to($tempUser->email);
            $message->subject('Verify your email address');
        });

        return redirect('login')->with('status', '認証メールを送信しました。');
    }

    public function verify($token)
    {
        $tempUser = TempRegisteredUser::where('token', $token)->firstOrFail();

        RegisteredUser::create([
            'email' => $tempUser->email,
            'password' => $tempUser->password,
        ]);

        return redirect('login')->with('status', '認証が完了しました。');;
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
            'email' => 'The provided credentials do not match our records.',
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
