@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Total Belanja</th>
                <th>Tanggal Transaksi</th>
                <th class="column-spacer"></th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach($transaction as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nama_barang}}</td>
                    <td>{{$item->jumlah_barang}}</td>
                    <td>Rp{{$item->total_harga}}</td>
                    <td>{{$item->created_at}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>

        @endsection
    </div>