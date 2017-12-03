<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Transaction;
use \Cart as Cart;
use \Auth as Auth;
use App\User;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

//        $userId=Auth::id();
//        $transactions=Transaction::where('user_id',$userId)->get();
//        return view('transactions')->with('transactions',$transactions);
        $transaction=Transaction::all();
        return view('transactions')->with('transaction',$transaction);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $transaction = new Transaction;

       $transaction->user_id=Auth::user()->id;
        $transaction->product_id=$request->product_id;
        $transaction->total_harga=$request->total_belanja;
        $transaction->jumlah_barang=$request->jumlah_barang;
        $transaction->nama_barang=$request->nama_barang;
        $transaction->nama_user=Auth::user()->name;
        $transaction->save();

        Cart::remove($request->id_keranjang);
        return redirect('cart')->withSuccessMessage('Barang berhasil dibeli');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    public function userTransaction()
    {
        $userId=Auth::id();
        $transactions=Transaction::where('user_id',$userId)->get();
        return view('transactions_user')->with('transaction',$transactions);

    }
}
