<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ev Dizayn Admin</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="sidebar-mini layout-fixed sidebar-collapse">
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
<div class="wrapper">

  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('home.png')}}" alt="OtelLogo" height="60" width="60">
  </div>

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <a href="" class="brand-link" style="color: gray">
            <img src="{{asset('home.png')}}" alt="Ev Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="font-weight-light">Ev Dizayn Sistemi</span>
          </a>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item" style="padding-top: 7px">
            {{Auth::user()->email}}
        </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{route('logout')}}" class="nav-link">Çıkış Yap</a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Kullanıcı İşlemleri</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Kullanıcı İşlemleri
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('adduser')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kullanıcı Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('updateuser')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kullanıcı Güncelle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('deleteuser')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kullanıcı Sil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('showAllusers')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tüm Kullanıcıler</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Yönetim</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>Ev Kayıt İşlemleri
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addhome')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ev Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('updatehome')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ev Güncelle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('deletehome')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ev Kaldır</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('showAllhomes')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tüm Evler</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>Duyuru
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addannouncement')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('editLastannouncement')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Son Duyuruyu Düzenle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('showAllannouncements')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tümü</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('messages')}}" class="nav-link">
              <i class="far fa-envelope nav-icon"></i>
              <p>Sohbet</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('title', 'Sayfa İsmi')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
    </section>
        @yield('form')
    </div>
    <footer class="main-footer">
        <strong>Ev Dizayn Sistemi Yönetici Paneli</strong>
        <div class="float-right d-none d-sm-inline-block">
        </div>
    </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

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
        top: 100px;
        left: 60%;
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

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<script src="{{asset('plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('plugins/flot/plugins/jquery.flot.resize.js')}}"></script>
<script src="{{asset('plugins/flot/plugins/jquery.flot.pie.js')}}"></script>
<script src="{{asset('dist/js/demo2.js')}}"></script>
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
