@extends('layouts.appAdmin')

@section('content')
    <div class="container">
    <table class="table">
        <thead>
        <tr>
            <th class="table-image"></th>
            <th>Produk</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th class="column-spacer"></th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach($products as $item)
            <tr>
                <td class="table-image"><a href="{{ url('shop', [$item->slug]) }}">
                        <img src="{{ asset('img/' . $item->image) }}" alt="product" class="img-responsive cart-image"></a></td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                @if ($item->category_id==1)
                <td>Food</td>
                    @elseif ($item->category_id==2)
                        <td>Beverage</td>
                    @elseif ($item->category_id==3)
                        <td>Merchandise</td>
                    @elseif ($item->category_id==4)
                        <td>Subscription Box</td>
                    @endif
                <td>
                    <form action="{{url('shop',[$item->id])}}" method="POST" class="side-by-side">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger btn-sm" value="Hapus">
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>


@endsection
    </div>