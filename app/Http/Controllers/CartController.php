<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \Cart as Cart;
use Validator;

class CartController extends Controller
{

    public function index()
    {
        return view('cart');
    }

    /**
     * Menambah barang di keranjang
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage('Barang sudah di keranjang');
        }

        Cart::add($request->id, $request->name, 1, $request->price,['description'=>$request->description])->associate('App\Product');
        return redirect('cart')->withSuccessMessage('Barang berhasil ditambahkan');
    }

    /**
     * Update barang di Keranjang
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('error_message', 'Banyak Barang harus diantara 1 dan 5');
            return response()->json(['success' => false]);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Barang Berhasil Diperbaharui');

        return response()->json(['success' => true]);

    }


    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('cart')->withSuccessMessage('Barang Berhasil Dihapus!');
    }

    public function emptyCart()
    {
        Cart::destroy();
        return redirect('cart')->withSuccessMessage('Keranjang Berhasil Dikosongkan');
    }

    public function switchToWishlist($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage('Barang sudah ada di daftar keinginan');
        }

        Cart::instance('wishlist')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

        return redirect('cart')->withSuccessMessage('Barang berhasil dipindah ke daftar keinginan');

    }
}
