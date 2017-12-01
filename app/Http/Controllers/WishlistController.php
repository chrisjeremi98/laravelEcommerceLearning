<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \Cart as Cart;


class WishlistController extends Controller
{


    public function index()
    {
        return view('wishlist');
    }


    public function store(Request $request)
    {
        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('shop')->withSuccessMessage('Barang Sudah ada Di Daftar Keinginan');
        }

        Cart::instance('wishlist')->add($request->id, $request->name, 1, $request->price)
            ->associate('App\Product');

        return redirect('shop')->withSuccessMessage('Barang Berhasil Ditambah ke daftar keinginan');
    }


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('wishlist')->remove($id);
        return redirect('wishlist')->withSuccessMessage('Item has been removed!');
    }

    public function emptyWishlist()
    {
        Cart::instance('wishlist')->destroy();
        return redirect('wishlist')->withSuccessMessage('Your wishlist has been cleared!');
    }


    public function switchToCart($id)
    {
        $item = Cart::instance('wishlist')->get($id);

        Cart::instance('wishlist')->remove($id);

        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage('');
        }

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

        return redirect('wishlist')->withSuccessMessage('Barang Berhasil Masuk Keranjang');

    }
}
