@extends('layouts.app')

@section('content')
    <div class="container">
        <p><a href="{{url('shop')}}">Home</a> / Wishlist</p>
        <h1>Daftar Keinginan</h1>
    </div>

    <hr>

    @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{ session()->get('success_message') }}
        </div>
    @endif

    @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{ session()->get('error_message') }}
        </div>
    @endif

    @if (sizeof(Cart::instance('wishlist')->content()) > 0)

        <table class="table" style="margin: 0px 80px 0px 80px">
            <thead>
            <tr>
                <th class="table-image"></th>
                <th>Produk</th>
                <th>Harga</th>
                <th class="column-spacer"></th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach (Cart::instance('wishlist')->content() as $item)
                <tr>
                    <td class="table-image"><a href="{{ url('shop', [$item->model->slug]) }}"><img src="{{ asset('img/' . $item->model->image) }}" alt="product" class="img-responsive cart-image"></a></td>
                    <td><a href="{{ url('shop', [$item->model->slug]) }}">{{ $item->name }}</a></td>

                    <td>${{ $item->subtotal }}</td>
                    <td class=""></td>
                    <td>
                        <form action="{{ url('wishlist', [$item->rowId]) }}" method="POST" class="side-by-side">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class="btn btn-danger btn-sm" value="Hapus">
                        </form>

                        <form action="{{ url('switchToCart', [$item->rowId]) }}" method="POST" class="side-by-side">
                            {!! csrf_field() !!}
                            <input type="submit" class="btn btn-success btn-sm" value="Ke Keranjang">
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <div class="spacer"></div>
        <div class="container">
        <a href="/shop" class="btn btn-primary btn-lg" >Lanjut Belanja</a> &nbsp;

        <div style="float:right" >
            <form action="{{ url('/emptyWishlist') }}" method="POST">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" class="btn btn-danger btn-lg" value="Kosongkan Daftar Keinginan">
            </form>
        </div>
        </div>

    @else
        <div class="container">
        <h3>Daftar Keinginan Kosong</h3>
        <a href="/shop" class="btn btn-primary btn-lg">Lanjut Belanja</a>
        </div>
    @endif

    <div class="spacer"></div>

    </div>

@endsection