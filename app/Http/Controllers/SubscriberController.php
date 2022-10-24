<?php

namespace App\Http\Controllers;

use App\Mail\ClientMail;
use App\Mail\SubscriberMail;
use App\Mail\SubscriptionEmail;
use Carbon\Carbon;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{

      /**
     * Construct
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
        $this->middleware('permission:subscriber,read')->only('index');
        $this->middleware('permission:subscriber,create')->only('create');
        $this->middleware('permission:subscriber,edit')->only('edit');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subscribers.index',[
            'subscribers' => Subscriber::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exist = Subscriber::where('email', $request->email)->first();

        $request->validate([
            'email'    => 'required|email',
        ]);


        if($exist){
            return response()->json(['success' => '400' , 'message' =>  __("Email Already Esist") ]);
        }else{
            Subscriber::create($request->except('_token') + ['created_at' => Carbon::now()]);

            if (getEmailSetting()) {
                Mail::to($request->email)->send(new SubscriberMail());
            }
            
            return response()->json(['success' => '200' , 'message' => __("Thanks For Subscribing Us")]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

         // Return back with success message
         return redirect()->route('subscribers.index')->withSuccess( __("Deleted Successfully"));
    }

    public function mass_delete(Request $request)
    {
        $subscribers = Subscriber::findMany($request->ids);
        $subscribers->each->delete();
        return response()->json(['success' => 'done']);
    }

    public function subscriberDateFilter(){
        $subscribers = Subscriber::whereBetween('created_at', [request()->start_date, request()->end_date])->paginate(10);
        return view('admin.subscribers.index', compact('subscribers'));

    }

}
