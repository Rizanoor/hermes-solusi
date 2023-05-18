<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function process(Request $request)
    {
        // Save users data
        $user = Auth::user();
        $user->update($request->except('total_price'));

        // Proses checkout
        $code = 'STORE-' . mt_rand(000000, 999999);
        $carts = Cart::with(['product', 'user'])
            ->where('users_id', Auth::user()->id)
            ->get();

        // // Transaction create
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'total_price' => (int) $request->total_price + (($request->total_price * 10) / 100),
            'transaction_status' => 'PENDING',
            'code' => $code
        ]);

        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(0000,9999);

            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'resi' => '',
                'code' => $trx
            ]);
        }

        // Delete cart data
        Cart::with(['product','user'])
          ->where('users_id', Auth::user()->id)
          ->delete();

        return view('pages.success');

    }
}
