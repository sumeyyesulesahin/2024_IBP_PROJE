@extends('admin_panel_layout')

@section('title', 'Tüm Kullanıcılar')

@section('form')
<div class="card-header bg-dark text-white text-center" style="width: 40%; margin-left: 30%;">
    <h3 class="card-title m-0">Kullanıcı Listesi</h3>
    <div class="card-body table-responsive p-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>E-posta</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users->sortBy('role') as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
