<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\User;

class StripeController extends Controller
{
public function subscription(Request $request){
    $user=Auth::user();
        return view('subscription',  [
            'intent' => $user->createSetupIntent()
        ]);
    }

    public function afterpay(Request $request){
        // ログインユーザーを$userとする
        $user=Auth::user();

        // またStripe顧客でなければ、新規顧客にする
        $stripeCustomer = $user->createOrGetStripeCustomer();

        // フォーム送信の情報から$paymentMethodを作成する
        $paymentMethod=$request->input('stripePaymentMethod');

        // プランはconfigに設定したbasic_plan_idとする
        $plan=('price_1P5TPxHTnh3jrMhWtnF2vJpp');
        
        // 上記のプランと支払方法で、サブスクを新規作成する
        $user->newSubscription('default', $plan)
        ->create($paymentMethod);

        // 処理後に'ルート設定'にページ移行
        return redirect('/');
    }

    public function edit_subscription(Request $request){
        $user=Auth::user();
        return view('/edit_subscription');
    }
   
    public function stripe_update(Request $request) {
        $paymentMethod = $request->input('stripePaymentMethod'); //支払情報
        Auth::user()->updateDefaultPaymentMethod($paymentMethod);
        return back()->with(["お支払い方法を変更しました。"]);
    }


    public function stripe_cancel(Request $request){
        $user=Auth::user();
        return view('/cancel_subscription');
    }

    public function cancel_subscription(User $user, Request $request){
       
        $user=Auth::user();

        $user->subscription('default')->cancelNow();

        return back();
     }
}
