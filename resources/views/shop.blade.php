@extends('layouts.app')

@section('extra-css')
    <link rel="stylesheet" href="{{asset('css/shop.css')}}">
    @endsection

@section('content')

    <div class="container">

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
    </div>

    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin: 0px 40px 0px 40px">
        <div class="carousel-inner">
            <div class="item active">
                <img src="{{asset('img/logo.png')}}">
                <div class="container">
                    <div class="carousel-caption">
                        <h1></h1>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{asset('img/carousel2.jpg')}}">
                <div class="container">
                    <div class="carousel-caption">
                        <h1></h1>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{asset('img/carousel3.jpg')}}">
                <div class="container">
                    <div class="carousel-caption">
                        <h1></h1>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{asset('img/carousel4.jpg')}}">
                <div class="container">
                    <div class="carousel-caption">
                        <h1></h1>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{asset('img/carousel5.jpg')}}">
                <div class="container">
                    <div class="carousel-caption">
                        <h1></h1>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{asset('img/carousel1.jpg')}}">
                <div class="container">
                    <div class="carousel-caption">
                        <h1></h1>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
    </div>

    @foreach ($products->chunk(4) as $items)
        <div class="row" style="margin: 40px">
            @foreach ($items as $product)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <a href="{{ url('shop', [$product->slug]) }}"><img src="{{ asset('img/' . $product->image) }}" alt="product" class="img-responsive"></a>
                            <a href="{{ url('shop', [$product->slug]) }}"><h3>{{ $product->name }}</h3>
                                <p>Rp{{ $product->price }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endforeach

        </div>

@endsection