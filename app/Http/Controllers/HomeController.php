<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\ReferToken;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;

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
        $coupons = Coupon::where('user_email', Auth::user()->email)->get();

        return view('home', compact('coupons'));
    }

    public function refer(Request $request)
    { 

        $friend_email = $request->email;

        $token = random_int(10, 999999);

        $refer_link = url()->current() . '/' .$token;

        $auth_email =Auth::user()->email;

        ReferToken::create(['from_user_email'=> $auth_email, 'to_user_email' => $friend_email, 'refer_token' => $token]);
         
        Mail::to($friend_email)->send(new SendMail($friend_email, $refer_link));

        return redirect('/home')->withSuccess('Email sent succesfully');

    }

    public function refer_accept($token)
    {

        $token = $token;
        return view('refer_accept', compact('token'));

    } 

    public function coupon_apply(Request $request)
    {

        $token = $request->token;
        $product = $request->product;

        $referrer_email = ReferToken::where('refer_token' , '=', $token)->value('from_user_email');

        Coupon::create(['user_email'=> $referrer_email, 'coupon_name' => '20% Discount', 'product_name' => $product]);

        return redirect('/email')->withSuccess('Purchase succesfully');

    } 

    public function email(Request $request)
    {

        return view('emails.success');

    }

}
