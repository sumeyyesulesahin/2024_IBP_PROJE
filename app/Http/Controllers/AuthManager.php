<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login() {
        return view('login');
    }

    function registration() {
        return view('registration');
    }

    function forgot_my_password() {
        return view('forgot_my_password');
    }

    public function loginPost(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin_panel');
            } else {
                return redirect()->route('user_panel');
            }
        }
        return redirect(route('login'))->with("error", "Giriş bilgileri hatalı");
    }

    function registrationPost(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        if(!$user){
            return redirect(route('registration'))->with('error', 'Kayıt başarısız, tekrar deneyin');
        }
        return redirect(route('login'))->with('success', 'Kayıt işlemi başarıyla tamamlandı');
    }

    function forgot_my_passwordPost(Request $request) {
        $request->validate([
            'email' => 'required|email:users',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect(route('forgot_my_password'))->withErrors(['email' => 'E-posta adresi bulunamadı.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('login'))->with('success', 'Şifreniz başarıyla sıfırlandı.');
    }

    function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('home'));
    }
}
