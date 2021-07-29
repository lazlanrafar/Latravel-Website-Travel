<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TransactionDetailRequest;

class CheckoutController extends Controller
{
    public function index($id){
        $item = Transaction::with(['details','travel_package'])->find($id);
        return view('pages.checkout',[
            "item" => $item
        ]);
    }

    public function process($id){
        $travel_package = TravelPackage::find($id);
        $transaction = Transaction::create([
            'travel_packages_id' => $id,
            'users_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transaction_total' => $travel_package->price,
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'username' => Auth::user()->username,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function remove($detail_id){
        $item = TransactionDetail::find($detail_id);

        $transaction = Transaction::with(['details', 'travel_package'])
            ->find($item->transactions_id);

        if($item->is_visa){
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->transaction_total -= $transaction->travel_package->price;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $item->transactions_id);
    }

    public function create(TransactionDetailRequest $request, $id){

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->find($id);

        if($request->is_visa){
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->transaction_total += $transaction->travel_package->price;

        $transaction->save();

        return redirect()->route('checkout',$id);
    }

    public function sucess($id){

        $transaction = Transaction::find($id);
        $transaction->transaction_status = 'SUCCESS';

        $transaction->save();
        
        return view('pages.sucess');
    }
}
