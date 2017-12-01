@extends('layouts.app')

@section('content')
    <div class="container" style="margin: 30px">
    <form action="{{url('/shop')}}" method="POST" enctype="multipart/form-data">

        {!!csrf_field() !!}
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
        </div>

        <div class="form-group">
            <label for="slug">Panggilan Barang (Harap Menggunakan (-)</label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="Panggilan Barang">
        </div>

        <div class="form-group">
            <label for="category">Kategori Barang</label></br>
            <select name="category" class="form-control-static">
                <option value=1>Food</option>
                <option value=2>Beverage</option>
                <option value=3>Merchandise</option>
                <option value=4>Subscription Box</option>
            </select>
        </div>

        <div class="form-group">
            <label for="price">Harga (Harap Menggunakan .00)</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Harga Barang">
        </div>

        <div class="form-group">
            <label for="description">Deskripsi Barang</label>
            <textarea name="description" id="description" class="field-long field-textarea form-control" placeholder="Deskripsi Barang" style="height: 100px"></textarea>
        </div>

        <div class="form-group">

            <label for="file_gambar">Pilih Gambar</label>
            <input type="file" id="file_gambar" name="file_gambar">

        </div>

        <input class="btn btn-primary" type="submit" value="Upload">

    </form>
    </div>

@endsection