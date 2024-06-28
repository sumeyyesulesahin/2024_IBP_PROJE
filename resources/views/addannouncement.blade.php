@extends('admin_panel_layout')

@section('title', 'Duyuru Ekle')

@section('form')
<div class="card-header bg-dark " style="width: 40%; margin-left: 30%;">
    <h3 class="card-title">Duyuru İçeriği</h3>
    <form action="{{ route('addannouncement.post') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group"><br>
                <label for="tittle">Duyuru Başlığı:</label>
                <input name="tittle" id="tittle" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Açıklama (Opsiyonel):</label>
                <input name="description" id="description" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="content">Duyuru Metni:</label>
                <input name="content" id="content" class="form-control" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Duyuru Oluştur</button>
        </div>
    </form>
</div>
    @endsection
