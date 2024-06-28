@extends('login_layout')
@section('title', 'Oturum Aç')

@section('form')
    <form action="{{route('login.post')}}" class="form-login" method="POST">
        @csrf
        <ul style="text-align: center" class="login-nav">
            <li class="login-nav__item">
                <a style="font-size: 30px" href="#">Oturum Aç</a>
            </li>
        </ul>
        <label for="login-input-user" class="login__label">Kullanıcı E-Posta</label>
        <input id="login-input-user" class="login__input" type="email" name="email" required autofocus>
        <label  for="login-input-password" class="login__label">Şifre</label>
        <input id="login-input-password" class="login__input" type="password" name="password" required>
        <a class="login__forgot" href="{{route('forgot_my_password')}}">Şifremi unuttum</a>
        <button class="login__submit" type="submit">Oturum Aç</button>
        <p style="color: white; text-align: center">İlk defa mı kullanacaksın? <a style="color: #fff" href="{{route('registration')}}">Kayıt Ol</a></p>
    </form>
@endsection
