<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class EmailVerificationController extends Controller
{
    public function verify(Request $request, $id, $hash): RedirectResponse
    {
        $user = User::find($id);

        if (!$user || sha1($user->email) !== $hash) {
            // メール確認が失敗した場合、エラーメッセージと共にリダイレクト
            return Redirect::to('/')->withErrors(['メールの確認に失敗しました。']);
        }

        // メールアドレスを確認済みにマーク
        $user->email_verified_at = now();
        $user->save();

        // メール確認後のリダイレクト先
        return Redirect::to('/home')->with('success', 'メールアドレスが確認されました。');
    }
}
