<?php

namespace App\Http\Controllers;

use Carbon\Carbon; 

use Illuminate\Http\Request;

use App\Models\DetailsTransaction;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transactions = Transaction::whereMonth('created_at',Carbon::now()->format('m'))->count();
        $productsSale = DetailsTransaction::whereMonth('created_at',Carbon::now()->format('m'))->sum('qty');

        $customer = User::where('is_admin',false)->count();
        $products = Product::count();

        // dd($transactions,$productsSale,$customer,$products);

        return view('admin.dashboard',compact('customer','products','transactions','productsSale'));
    }
}
