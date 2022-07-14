<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransaction;
use App\Models\Payable;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    public function create(CreateTransaction $request)
    {
        $transaction = new Transaction();
        $transaction->tax_bar_code = $request->tax_bar_code;
        $transaction->amount = $request->amount;
        $transaction->payment_method = $request->payment_method;
        $transaction->card_number = $request->payment_method != 'cash' ? $request->card_number : null;
        $transaction->paid_at = Carbon::parse($request->paid_at);
        $transaction->save();

        $payable = Payable::find($request->tax_bar_code);
        $payable->status = 'paid';
        $payable->save();
    }

    public function list_transactions($init_date, $end_date)
    {
        return Transaction::whereDate('paid_at', '>=', $init_date)->whereDate('paid_at', '<=', $end_date)
        ->select('paid_at')->groupBy('paid_at')->get()->map(function($tran) {
            $trans = Transaction::whereDate('paid_at', Carbon::parse($tran->paid_at)->format('Y-m-d'))
                ->select('tax_bar_code', 'amount')->get();
            return [
                'paid_at' => $tran->paid_at,
                'transactions' => $trans,
                'quantity' => $trans->count()
            ];
        });
    }
}
