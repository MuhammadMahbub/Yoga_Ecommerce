<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceAdminEmail;
use App\Mail\InvoiceMail;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Category;
use App\Models\ClassBannerSetting;
use App\Models\ClassPricing;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Gallery;
use App\Models\GalleryBannerSettings;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\ServiceClassBannerSetting;
use App\Models\ServiceParis;
use App\Models\Shop;
use App\Models\ShopBanner;
use App\Models\StripeSetting;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\YogaClass;
use App\Models\YogaStudio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stripe;
use Stripe\Stripe as StripeStripe;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index',[
            'banners' => Banner::all(),
            'shops'   => Shop::latest()->limit(8)->get(),
            'blogs'   => Blog::latest()->limit(3)->get(),
            'classes' => YogaClass::where('date', '>=' ,Carbon::today())->orderBy('date', 'asc')->get(),
            'testimonials' => Testimonial::latest()->get()->take(3),
        ]);
    }


    public function shop()
    {
        return view('frontend.shop',[
            'shops'   => Shop::latest()->limit(8)->get(),
            'shopbanner'   => ShopBanner::first(),
        ]);
    }

    public function single_product($slug)
    {
        $single_product   = Shop::where('slug', $slug)->first();
        $related_products = Shop::where('category_id', $single_product->category_id)->where('id', '!=', $single_product->id )->get();

        return view('frontend.single_product',[
            'single_product'   => $single_product,
            'related_products' => $related_products,
        ]);
    }

    public function about()
    {
        return view('frontend.about',[
            'about'   => AboutUs::first(),
            'teams'   => Team::all(),
            'studios' => YogaStudio::all(),
        ]);
    }

    public function blog()
    {
        return view('frontend.blog',[
            'blogs' => Blog::latest()->limit(9)->get(),
        ]);
    }

    public function blogs_load_more(Request $request)
    {
        $blogs = Blog::orderBy('created_at', 'desc')->skip($request->count)->take(3)->get();

        $data = view('frontend.includes.blog_load_more',compact('blogs'))->render();

        $count = $request->count + 3;
        $blog_count = $blogs->count();

        return response()->json(['data'=>$data, 'count'=> $count,'blog_count'=>$blog_count]);
    }

    public function shops_load_more(Request $request)
    {
        $shops = Shop::orderBy('created_at', 'desc')->skip($request->count)->take(4)->get();

        $data = view('frontend.includes.shop_load_more',compact('shops'))->render();

        $count = $request->count + 4;
        $shop_count = $shops->count();

        return response()->json(['data'=>$data, 'count'=> $count,'shop_count'=>$shop_count]);
    }

    public function single_post($slug)
    {
        return view('frontend.single_post',[
            'single_blog' => Blog::where('slug', $slug)->first(),
            'related_blogs' => Blog::where('slug', '!=', $slug)->latest()->limit(3)->get(),
        ]);
    }

    public function events()
    {
        return back();
        return view('frontend.events');
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function cartAdd(Request $request){
        $cart = Cart::where('product_id', $request->product_id)->where('device_ip', request()->ip())->first();
        if($cart){
            $cart->quantity = $cart->quantity + 1;
            $cart->save();
        }else{
            Cart::create([
                'device_ip' => request()->ip(),
                'product_id' => $request->product_id,
                'quantity' => 1,
            ]);
        }
        return back()->with('success', 'Cart Updated');
    }

    public function cartRemove($id){
        $cart = Cart::find($id);
        if($cart){
            $cart->delete();
        }

        return back()->with('success', 'Item Removed');

    }

    public function cartCheckout(Request $request){
        foreach($request->ids as $key => $value){
            $cart = Cart::find($value);
            if($cart){
                $cart->quantity = $request->quantity[$key];
                $cart->save();
            }
        }

        if($request->update_button){
            return back()->with('success', 'Cart Updated');
        }
        else{
            return redirect()->route('checkout');
        }
    }

    public function checkoutPayment(Request $request){
        $stripe = StripeSetting::first();
        \Stripe\Stripe::setApiKey($stripe->stripe_secret);

        if(isset($_POST['stripeToken']))
        {
            \Stripe\Stripe::setVerifySslCerts(false);

			$token = $_POST['stripeToken'];
            $response = \Stripe\Charge::create([
                'amount' => cartTotal()*100,
                'currency' => 'eur',
                'description' => 'Stripe Payment',
                'source' => $token,
                'metadata' => ['order_id' => uniqid()],
            ]);

            $bal = \Stripe\BalanceTransaction::retrieve($response->balance_transaction);
            $balJson = $bal->jsonSerialize();

            $items = Cart::where('device_ip', request()->ip())->get();
            $items->each->delete();


            OrderAddress::create($request->except(['_token', 'payment_method', 'stripeToken', 'stripeTokenType', 'stripeEmail']) + ['order_id' => 1]);


            return back()->with('success', __('Payment is successful!'));
        }
    }
    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function contact()
    {
        return view('frontend.contact',[
            'contact'   => Contact::first(),
            'galleries' => YogaStudio::latest()->limit(2)->get()
        ]);
    }


    public function classes()
    {
        $classes = YogaClass::where('date', '>=' ,Carbon::today())->orderBy('date', 'asc')->get();
        $banner  = ClassBannerSetting::first();

        return view('frontend.classes', compact('classes','banner'));
    }

    public function classDetails($slug, $id){
        $class = YogaClass::find($id);
        $stripe = StripeSetting::first();
        $next = YogaClass::where('date', '>=' ,Carbon::today())->where('id', '>', $id)->get()->min('id');
        $next_class = YogaClass::find($next);
        return view('frontend.class_details', compact('class','next_class', 'stripe'));
    }

    public function page_404()
    {
        return view('frontend.404');
    }

    public function classJoinPayment(Request $request){

        $stripe = StripeSetting::first();
        Stripe\Stripe::setApiKey($stripe->stripe_secret);

        $payment = Stripe\Charge::create ([
            "amount" => 100 * $request->price,
            "currency" => "EUR",
            "source" => $request->stripeToken,
            "description" => "Test payment from ".config('app.name'), 
        ]);

        $last_order = Order::orderBy('id', 'desc')->first();
        if($last_order){
            $order_number = $last_order->order_number + 1;
        }else{
            $order_number = 1;
        }


        $order = Order::create([
            'order_number'     => sprintf("%05d", $order_number),
            'order_date'       => Carbon::now(),
            'order_status'     => 'pending',
            'order_total'      => $request->price,
            'payment_status'   => 'paid',
            'payment_method'   => 'stripe',
            'person'           => $request->person,
            'class_date'       => $request->date,
            'charge_id'        => $payment->id,
            'customer_ip'      => request()->ip(),
            'coupon_code'      => $request->coupon ?? '',
            'coupon_discount'  => $request->originalPrice - $request->price,
            'class_id'         => $request->class_id,
            'shipping_name'    => $request->name,
            'shipping_email'   => $request->email,
            'shipping_mobile'  => $request->phone,
            'shipping_address' => $request->address,
            'shipping_address' => $request->address,
            'class_type'       => $request->class_type,
        ]);

        // dd($order->dd());
        // return view('emails.invoice_mail',compact('order'));
          
        if (getEmailSetting()) {
            Mail::to($request->email)->send(new InvoiceMail($order));

            $users = User::get();

            foreach ($users as $user) {
                Mail::to($user->email)->send(new InvoiceAdminEmail($order));
            }
        }
        
        return back()->with('success', 'Payment successful!');
    }

    public function couponCheck(Request $request){
        $coupon = Coupon::where('code', $request->coupon)->first();
        if($coupon){
            if(Carbon::parse($coupon->expiry_date) < Carbon::today()){
                return response()->json(['error' => 'Coupon Expired']);
            }else{
                $check_coupon = Order::where('customer_ip', request()->ip())->where('coupon_code', $request->coupon)->first();
                if($check_coupon){
                    return response()->json(['error' => 'You Already Used This Coupon']);
                }else{
                    if($coupon->type == 'flat'){
                        $price = $request->price - $coupon->value;
                    }else{
                        $price = $request->price - ($request->price*$coupon->value)/100;
                    }
                    return response()->json(['price' => $price, 'success' => 'Congrates! Coupon code applied successfully.']); 
                }
            }
        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }

    public function classDateChange(Request $request){
        $pricing = ClassPricing::find($request->id);
        $class = YogaClass::find($request->class_id);
        $view = view('frontend.includes.pricing_list', compact('pricing', 'class'))->render();
        return response($view);
    }


    
    public function gallery()
    {
        $galleries = Gallery::latest()->get();
        $banner    = GalleryBannerSettings::first();
        return view('frontend.gallery',compact('galleries','banner'));
    }

    public function galleryDetails($slug)
    {
        $gallery = Gallery::where('slug',$slug)->first();

        return view('frontend.gallery_details',compact('gallery'));
    }


    public function serviceParis()
    {
        $classes = ServiceParis::where('date', '>=' ,Carbon::today())->orderBy('date', 'asc')->get();
        $banner  = ServiceClassBannerSetting::first();

        return view('frontend.service_paris', compact('classes','banner'));
    }




    public function serviceDetails($slug, $id){
        $class       =  ServiceParis::find($id);
        $stripe      =  StripeSetting::first();
        $next        =  ServiceParis::where('date', '>=' ,Carbon::today())->where('id', '>', $id)->get()->min('id');
        $next_class  =  ServiceParis::find($next);

        return view('frontend.service_paris_details', compact('class','next_class', 'stripe'));
    }


}
