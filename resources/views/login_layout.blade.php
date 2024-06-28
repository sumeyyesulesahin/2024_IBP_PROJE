<!DOCTYPE html>
<html lang="tr" >
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'baslik')</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel="stylesheet" href="{{asset('login_layout.css')}}">

</head>
<body>
    <div class="login-container" style="margin-top: 0px">
    <div id="message-container">
        @foreach ($errors->all() as $error)
            <div class="message error">{{ $error }}</div>
        @endforeach

        @if (session('error'))
            <div class="message error">{{ session('error') }}</div>
        @endif

        @if (session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif
    </div>
    @yield('form','form')
</div>

</body>
<style>
    .message {
        background-color: #f8d7da;
        color: #721c24;
        padding: 1rem;
        border: 1px solid #f5c6cb;
        border-radius: 0.25rem;
        margin-bottom: 1rem;
        opacity: 0;
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
        transform: translateY(-20px);
    }

    .message.success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
    }

    .message.show {
        opacity: 1;
        transform: translateY(0);
    }
    #message-container {
        position: fixed;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1000;
        width: 80%;
        max-width: 400px;
    }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const messages = document.querySelectorAll('.message');
            messages.forEach(message => {
                message.classList.add('show');
                setTimeout(() => {
                    message.classList.remove('show');
                }, 3000);
            });
        });
    </script>
</html>
