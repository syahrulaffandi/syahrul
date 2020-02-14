<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\DetailsTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionWebController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::with(['userRelation', 'detailRelation'])->paginate(20);

        return view('admin.transaction.index')->with(['transactions' => $transactions]);

        // dd($transactions);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $transaction = Transaction::latest()->first();

        $user = User::all();

        $products = Product::all();

        return view('admin.transaction.create', compact('transaction', 'products', 'user'));
    }

    public function show($id)
    {
        $transaction = DetailsTransaction::with('productRelation')->where('transaction_id', $id)->get();

        return view('admin.transaction.detail')->with(['transaction' => $transaction]);

        // dd($transaction);
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

    public function destroy($id)
    {
        $product = product::find($id);

        $product->delete();

        return redirect()->route("transaction.create");
    }
}
