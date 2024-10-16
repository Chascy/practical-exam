<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showAllTransactions(){
        $transactions = Transaction::orderBy('updated_at', 'desc')->get();
        return view('transactions', ['transactions' => $transactions]);
    }

    public function createTransaction(){
        return view('create-transactions');
    }

    public function storeTransaction(Request $request){
        $validation = $request->validate([
            'transaction_title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:10',
            'total_amount' => 'required|string|max:255',
            'transaction_number' => 'required|string|max:255'
        ]);

        Transaction::create($validation);

        return redirect()->route('showAllTransactions');
    }

    public function viewTransaction(Request $request){
        $transaction = Transaction::find($request->id);
        return view('transaction', ['transaction' => $transaction]);
    }

    public function editTransaction(Request $request){
        $transaction = Transaction::find($request->id);
        return view('edit-transaction', ['transaction' => $transaction]);
    }

    public function updateTransaction(Request $request){
        $validation = $request->validate([
            'transaction_title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:10',
            'total_amount' => 'required|string|max:255',
            'transaction_number' => 'required|string|max:255'
        ]);

        $transaction = Transaction::find($request->id);
        $transaction->update($validation);

        return redirect()->route('viewTransaction', ['id' => $transaction->id]);
    }

    public function deleteTransaction(Request $request){
        $transaction = Transaction::find($request->id);
        if ($transaction){
            $transaction->delete();
        }

        return redirect()->route('showAllTransactions');
    }
}
