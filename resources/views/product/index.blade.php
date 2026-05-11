@extends('layouts.app')
@section('content_title', 'Data Produk')
@section('content')

<div class="card">
    <div class="card-title">
        <h4 class="card-header">Data Produk</h4>
    </div>
    <div class="card-body">
        <table class="table table-sm" id="table2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>SKU</th>
                    <th>Nama Produk</th>
                    <th>Harga Jual</th>
                    <th>harga Beli</th>
                    <th>Stok</th>
                    <th>Aktif</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product )
                   <tr>
                    <td>{{ index + 1 }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->nama_product }}</td>
                    <td>Rp. {{ number_format($product->harga_jual) }}</td>
                    <td>Rp. {{ number_format($product->harga_beli_pokok) }}</td>
                    <td>{{ nuber_format($product->stok) }}</td>
                    <td>{{ $product->is_active }}</td>
                    <td></td>
                   </tr> 
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection