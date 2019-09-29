<?php

namespace App\Http\Controllers;

use App\Order;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        $orders = "";

        return view('home.transaction', compact('transactions', 'orders'));
    }

    public function getOrder($id)
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        $orders = Order::where('transaction_id', $id)->get();

        return view('home.transaction', compact('transactions', 'orders'));
    }
}
