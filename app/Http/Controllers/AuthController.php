<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('login');
    }

    // ログインフォームを表示
    public function showLoginForm()
    {
        return view('auth.login');
    }

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
