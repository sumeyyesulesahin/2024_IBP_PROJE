@extends('admin_panel_layout')

@section('title', 'Kullanıcı Ekle')

@section('form')
            <div class="card-header bg-dark text-white text-center" style="width: 40%; margin-left: 30%;">
                <h3 class="card-title m-0">Yeni Kullanıcı Bilgileri</h3>
                <form action="{{ route('adduser.post') }}" method="post">
                    @csrf
                    <div class="card-body p-4">
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">E-posta:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email adresi giriniz" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Şifre:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Şifre giriniz" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="role" class="form-label">Rol:</label>
                            <select name="role" id="role" class="form-select">
                                <option value="kullanici">Kullanıcı</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button style="background-color: gray" type="submit" class="btn btn-primary">Kullanıcı Oluştur</button>
                    </div>
                </form>
            </div>
@endsection
