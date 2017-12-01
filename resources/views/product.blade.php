@extends('layouts.app')

@section('extra-css')
    <link href="{{asset('css/product.css')}}" rel="stylesheet" >
@endsection

@section('content')
    <div class="container" style="margin: 40px 40px 100px 40px">
    <div class="container">
        <p><a href="{{url('/shop')}}">Shop</a> / {{$product->name}}</p>
        <h1>{{$product->name}}</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-4">
            <img src="{{asset('img/'.$product->image)}}"alt="product" class="img-responsive">
        </div>

        <div class="col-md-8">
            <h3>Rp{{$product->price}}</h3>
            @if (Auth::guest())
            @else
            <form action="{{ url('/cart') }}" method="POST" class="side-by-side">
                {!! csrf_field() !!}
                <input type="hidden" name="id" value="{{$product->id}}">
                <input type="hidden" name="name" value="{{$product->name}}">
                <input type="hidden" name="price" value="{{$product->price}}">
                <input type="hidden" name="description" value="{{$product->description}}">
                <input type="submit" class="btn btn-success btn-lg" value="Add To Cart">
            </form>
            <form action="{{url('/wishlist')}}" method="POST" class="side-by-side">
                {!! csrf_field() !!}
                <input type="hidden" name="id" value="{{$product->id}}">
                <input type="hidden" name="name" value="{{$product->name}}">
                <input type="hidden" name="price" value="{{$product->price}}">
                <input type="submit" class="btn btn-success btn-lg" value="Add To Wishlist">
            </form>

            @endif

            <br><br>
            {{$product->description}}


        </div>
    </div>
    </div>
    <div class ="row" style="margin: 100px 40px 100px 40px">
        <h3>Rekomendasi</h3>
        @foreach($interested as $product)
            <div class="col-md-3" style="margin-top: 50px">
                <div class="thumbnail">
                    <div class="caption text-center">
                        <a href="{{url('shop',[$product->slug])}}"><img src="{{asset('img/'.$product->image)}}" alt="product" class="img-responsive"> </a>
                        <a href="{{url('shop',[$product->slug])}}"><h3>{{$product->name}}</h3>
                        <p>Rp{{$product->price}}</p>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="spacer">


    </div>

    @endsection