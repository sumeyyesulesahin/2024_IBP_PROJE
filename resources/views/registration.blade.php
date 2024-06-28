@extends('login_layout')
@section('title', 'Kaydol')

@section('form')
    <form action="{{route('registration.post')}}" class="form-login" method="POST">
        @csrf
        <ul style="text-align: center" class="login-nav">
            <li class="login-nav__item">
                <a style="font-size: 30px" href="#">Kaydol</a>
            </li>
        </ul>
        <label for="login-input-user" class="login__label">Kullanıcı E-Posta</label>
        <input id="login-input-user" class="login__input" type="email" name="email" required autofocus>
        <label  for="login-input-password" class="login__label">Şifre</label>
        <input id="login-input-password" class="login__input" type="password" name="password" required>
        <label  for="login-input-password" class="login__label">Şifreyi Doğrula </label>
        <input id="login-input-password" class="login__input" type="password" name="password" required>

        <p style="color: white; text-align: center">Zaten hesabın var mı? <a style="color: #fff" href="{{route('login')}}">Oturum Aç</a></p>

        <button class="login__submit" type="submit">Kaydol</button>
    </form>

@endsection
