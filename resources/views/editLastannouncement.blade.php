@extends('admin_panel_layout')

@section('title', 'Duyuru Güncelle')

@section('form')
<div class="card-body bg-dark " style="width: 40%; margin-left: 30%;">

    <form action="{{ route('editLastannouncement.post') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="tittle" class="form-label">Duyuru Başlığı:</label>
                <input type="text" name="tittle" id="tittle" class="form-control" value="{{ $Update->tittle }}" placeholder="Başlık giriniz" required>
            </div>

            <div class="form-group mb-3">
                <label for="description" class="form-label">Açıklama (Opsiyonel):</label>
                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Açıklama giriniz">{{ $Update->description }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="content" class="form-label">Duyuru Metni:</label>
                <textarea name="content" id="content" class="form-control" rows="5" placeholder="İçerik giriniz" required>{{ $Update->content }}</textarea>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-warning">Duyuruyu Güncelle
            </button>
        </div>
    </form>
</div>
    @endsection
