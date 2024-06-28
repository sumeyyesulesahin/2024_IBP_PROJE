@extends('admin_panel_layout')

@section('title', 'Ev Güncelle')

@section('form')
            <div class="card border-secondary bg-dark shadow-lg" style="width: 40%; margin-left: 30%;">
                <form action="{{ route('updatehome.post') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="home_name" class="form-label">Güncellenecek Evin İsmi:</label>
                            <input type="text" name="home_name" id="home_name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="location" class="form-label">Şehir:</label>
                            <input type="text" name="location" id="location" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="post_code" class="form-label">Posta Kod:</label>
                            <input type="text" name="post_code" id="post_code" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="defination" class="form-label">Ev Tanımı:</label>
                            <textarea name="defination" id="defination" class="form-control" rows="2" required></textarea>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-success">Evi Güncelle</button>
                    </div>
                </form>
            </div>
@endsection
