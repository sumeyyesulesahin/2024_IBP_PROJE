@extends('admin_panel_layout')

@section('title', 'Evi Sil')

@section('form')
<div class="card border-dark bg-dark  shadow-lg" style="width: 40%; margin-left: 30%;">
    <div class="card-header bg-dark text-white d-flex align-items-center">
        <h3 class="card-title mb-0">Silinecek Evin İsmi</h3>
    </div>
    <form action="{{ route('deletehome.post') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="home_name" class="form-label">Evin İsmi:</label>
                <input name="home_name" id="home_name" class="form-control" placeholder="Ev ismini giriniz" required>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-danger"> Evi Sil </button>
        </div>
    </form>
</div>
@endsection
