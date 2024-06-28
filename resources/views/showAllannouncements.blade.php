@extends('admin_panel_layout')

@section('title', 'Tüm Duyurular')

@section('form')
            <div class="card-header bg-dark " style="width: 40%; margin-left: 30%;">
                <h3 class="card-title">Haberler Listesi</h3>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Başlık</th>
                                <th>Açıklama</th>
                                <th>İçerik</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Updates->sortBy('role') as $update)
                            <tr>
                                <td>{{ $update->id }}</td>
                                <td>{{ $update->tittle }}</td>
                                <td>{{ $update->description }}</td>
                                <td>{{ Str::substr($update->content, 0, 150) }}...</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
