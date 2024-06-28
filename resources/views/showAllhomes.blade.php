@extends('admin_panel_layout')

@section('title', 'Tüm Evler')

@section('form')
<div class="card-header bg-dark " style="width: 40%; margin-left: 30%;">
    <h3 class="card-title">Dükkanlar Listesi</h3>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>İsim</th>
                    <th>Konum</th>
                    <th>Posta Kodu</th>
                    <th>Tanım</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($homes->sortBy('name') as $home)
                <tr>
                    <td>{{ $home->id }}</td>
                    <td>{{ $home->home_name }}</td>
                    <td>{{ $home->location }}</td>
                    <td>{{ $home->post_code }}</td>
                    <td>{{ $home->defination }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
