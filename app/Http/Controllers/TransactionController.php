<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function creatTransaction(Request $request)
    {
        dd($request->all());
        Transaction::create($request->all);

        return redirect()->route('home');
    }
}
