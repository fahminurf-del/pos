@extends('layouts.app')
@section('content_title','Data Kategori')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Daftar Kategori</h4>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-2">
            <x-kategori.form-kategori />
        </div>
        <table class="table table-sm table-responsive" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_kategori }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            <div>
                                <x-kategori.form-kategori :id="$item->id" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection