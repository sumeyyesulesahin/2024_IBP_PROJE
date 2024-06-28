@extends('admin_panel_layout')

@section('title', 'Kullanıcı Sil')

@section('form')
<div class="card-header bg-dark text-white text-center" style="width: 40%; margin-left: 30%;">
    <h3 class="card-title m-0">Silinecek Kullanıcının E-Posta Adresi</h3>
    <form action="{{ route('deleteuser.post') }}" method="post">
        @csrf
        <div class="card-body p-4">
            <div class="form-group mb-3">
                <label for="email" class="form-label">E-posta:</label>
                <input style="color: black" type="email" name="email" id="email" class="form-control" placeholder="Email adresi giriniz" required>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-danger">Kullanıcıyı Sil</button>
        </div>
    </form>
</div>
@endsection
