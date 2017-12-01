{{--MASALAH DI POPUP DESKRIPSI--}}

@extends('layouts.app')

@section('content')

    <div class="container">
        <p><a href="/shop">Home</a> / Cart</p>
        <h1>Daftar Belanja</h1>

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

        @if(sizeof(Cart::content())>0)
            <table class="table">
                <thead>
                <tr>
                    <th class="table-image"></th>
                    <th>Produk</th>
                    <th>Kuantitas</th>
                    <th>Harga</th>
                    <th class="column-spacer"></th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach(Cart::content() as $item)
                    <tr>
                        <td class="table-image"><a href="{{url('shop',[$item->model->slug])}}"><img
                                        src="{{asset('img/'.$item->model->image)}}" alt="product"
                                        class="img-responsive cart-image"> </a></td>
                        <td><a href="{{url('shop'),[$item->model->slug]}}">{{$item->name}}</a></td>
                        <td>
                            <select class="quantity" data-id="{{$item->rowId}}">
                                <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                                <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                                <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                                <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                                <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
                            </select>
                        </td>
                        <td>Rp{{$item->subtotal}}</td>
                        <td class=""></td>
                        <td>
                            <form action="{{url('cart',[$item->rowId])}}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger btn-sm" value="Hapus">
                            </form>

                            <form action="{{url('switchToWishlist',[$item->rowId])}}" method="POST"
                                  class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="submit" class="btn btn-success btn-sm" value="Ke Daftar Keinginan">
                            </form>

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#product_view{{$item->id}}"><i class="fa fa-search"></i> Bayar
                            </button>
                        </td>
                    </tr>

                    <div class="modal fade product_view" id="product_view{{$item->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h3 class="modal-title">Konfirmasi Pembayaran</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 product_img">
                                            <img src="{{asset('img/'.$item->model->image)}}" class="img-responsive">
                                        </div>
                                        <div class="col-md-6 product_content">
                                            <h4>{{$item->name}}</h4>

                                            <p>{{$item->options->description}}</p>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <select class="quantity" data-id="{{$item->rowId}}">
                                                        <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                                                        <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                                                        <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                                                        <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                                                        <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
                                                    </select>
                                                </div>
                                                <!-- end col -->

                                                <!-- end col -->
                                            </div>
                                            <div class="space-ten">Rp{{$item->subtotal}}</div>
                                            <div>
                                                <form action="{{ url('/transaction') }}" method="POST" class="side-by-side">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="r" value="{{$item->id}}">
                                                    <input type="hidden" name="total_belanja" value="{{$item->subtotal}}">
                                                    <input type="hidden" name="jumlah_barang" value="{{$item->qty}}">
                                                    <input type="hidden" name="id_keranjang" value="{{$item->rowId}}">
                                                    <input type="submit" class="btn btn-success btn-lg glyphicon glyphicon-shopping-cart" value="BAYAR">
                                                </form>
                                                {{--<button type="button" class="btn btn-primary"><span--}}
                                                            {{--class="glyphicon glyphicon-shopping-cart"></span>Bayar--}}
                                                {{--</button>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach


                <tr class="border-bottom">
                    <td class="table-image"></td>
                    <td style="padding:40px"></td>
                    <td class="small-caps table-bg" style="text-align: right">Total Belanja</td>
                    <td class="table-bg">Rp{{Cart::total()}}</td>
                    <td class="column-spacer"></td>
                    <td></td>
                </tr>
                </tbody>

            </table>
            <a href="{{url('/shop')}}" class="btn btn-primary btn-lg">Lanjut Belanja</a>

            <div style="float: right">
                <form action="{{url('/emptyCart')}}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE"></p>
                    <button type="submit" class="btn btn-danger btn-lg">HAPUS KERANJANG</button>
                </form>
            </div>
        @else
            <h3>Tidak ada barang di Keranjang</h3>
            <a href="{{url('/shop')}}" class="btn btn-primary btn-lg">Lanjut Belanja</a>
        @endif
        <div class="spacer"></div>

    </div>

@endsection



@section('extra-js')
    <script>
        (function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantity').on('change', function () {
                var id = $(this).attr('data-id')
                $.ajax({
                    type: "PATCH",
                    url: '{{ url("/cart") }}' + '/' + id,
                    data: {
                        'quantity': this.value,
                    },
                    success: function (data) {
                        window.location.href = '{{ url('/cart') }}';
                    }
                });

            });

        })();

    </script>
@endsection
