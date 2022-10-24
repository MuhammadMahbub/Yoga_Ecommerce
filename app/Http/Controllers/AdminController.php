<?php

namespace App\Http\Controllers;

use App\Events\ActiveClientEvent;
use App\Mail\SubscriberAdminEmail;
use App\Models\Contact;
use App\Models\ContactMessage;
use App\Models\Instagram;
use App\Models\Order;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\UserPermission;
use App\Models\YogaClass;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shetabit\Visitor\Models\Visit;
use DB;
use Event;
use Hash;
use Illuminate\Support\Facades\Mail;
use Rainwater\Active\Active;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:user,read')->only('userList');
        $this->middleware('permission:user,create')->only('userCreate');
        $this->middleware('permission:user,edit')->only(['userEdit','userDetaile']);
    }


    public function index(){


        $total    = Visit::whereIn('browser', ['IE', 'Firefox', 'Chrome', 'Safari', 'Opera'])->whereDate('created_at', '>', Carbon::now()->subDays(28))->get();
        $chrome   = $total->where('browser', 'Chrome')->count();
        $firefox  = $total->where('browser', 'Firefox')->count();
        $internet = $total->where('browser', 'IE')->count();
        $safari   = $total->where('browser', 'Safari')->count();
        $opera    = $total->where('browser', 'Opera')->count();

        $total   = $total->count();
        if ($total == 0) {
            $total = 1;
        }
        $browser = [];

        $browser['chrome']   = round(($chrome /  $total) * 100);
        $browser['firefox']  = round(($firefox /  $total) * 100);
        $browser['internet'] = round(($internet /  $total) * 100);
        $browser['safari']   = round(($safari /  $total) * 100);
        $browser['opera']    = round(($opera /  $total) * 100);

        $today_page_views = Visit::whereDate('created_at', '=', Carbon::today())->count();

        $unique_users = User::count();


        $top_pages = Visit::select('url')
            ->selectRaw('COUNT(*) AS count')
            ->groupBy('url')
            ->orderByDesc('count')
            ->limit(10)
            ->get();
        $subs = Subscriber::select(array(DB::raw('DATE(created_at) AS date')), DB::raw('COUNT(code) AS count'))->groupBy('date')->get();
        $conts = ContactMessage::select(array(DB::raw('DATE(created_at) AS date')), DB::raw('COUNT(code) AS count'))->groupBy('date')->get();

        $total = [];
        $date  = [];
        $contacts_date  = [];
        $contacts  = [];

        foreach($subs as $w){
            $total[] = Subscriber::whereDate('created_at', Carbon::parse($w->date))->get()->count();
            $date[]  = Carbon::parse($w->date)->format('d M');
        }

        foreach($conts as $cont){

            $contacts[]       = ContactMessage::whereDate('created_at', Carbon::parse($cont->date))->get()->count();
            $contacts_date[]  = Carbon::parse($cont->date)->format('d M');
        }


        $months = [];
        $contact_count  = [];
        $subscriber_count  = [];
        $sell = [];
        $refund = [];
        foreach (CarbonPeriod::create(Carbon::today()->subMonths(12), '1 month', Carbon::today()) as $month) {

            $months []           = $month->format('M-Y');
            $contact_count []    = ContactMessage::whereYear('created_at',$month->format('Y'))->whereMonth('created_at',$month->format('m'))->count();
            $subscriber_count [] = Subscriber::whereYear('created_at',$month->format('Y'))->whereMonth('created_at',$month->format('m'))->count();

            $sell []  = Order::whereYear('created_at',$month->format('Y'))->whereMonth('created_at',$month->format('m'))->sum('order_total');
            $refund [] = -1 * Order::whereYear('created_at',$month->format('Y'))->whereMonth('created_at',$month->format('m'))->sum('refund_amount');
        }


        $orders = Order::where('order_status','confirm')->where('class_type',  'yoga_class')
                        ->select(
                            'class_id',
                            DB::raw('sum(order_total) as price_sum'),
                            DB::raw('count(class_id) as sell_count'),
                            DB::raw('sum(refund_amount) as refund_sum'),

                        )
                        ->groupBy('class_id',)
                        ->orderBy('sell_count','DESC')
                        ->get();


        $orders_service = Order::where('order_status','confirm')->where('class_type',  'service_paris')
                        ->select(
                            'class_id',
                            DB::raw('sum(order_total) as price_sum'),
                            DB::raw('count(class_id) as sell_count'),
                            DB::raw('sum(refund_amount) as refund_sum'),

                        )
                        ->groupBy('class_id',)
                        ->orderBy('sell_count','DESC')
                        ->get();

                        // dd($orders_service);

        $total_sell_count  = Order::count();
        $total_sell        = Order::sum('order_total');
        $total_refund      = Order::sum('refund_amount');
        $total_courses     = YogaClass::count();

        // dd($orders);
        if ($orders->first() != null) {
            $sell_percent = $orders->first()->sell_count * 100 / $orders->sum('sell_count');
        }else {
            $sell_percent = 0;
        }


        $latest_order = Order::whereBetween('created_at',[Carbon::today(), Carbon::today()->subDays(3)])->sum('order_total');
            
        
        $numberOfGuests = Active::guests(1)->count();
        // dd($numberOfGuests);
        // $numberOfGuests = 0;

        

        return view('admin.index',compact('browser', 'today_page_views', 'unique_users', 'top_pages', 'total', 'date','subs','months','contact_count','subscriber_count','contacts','contacts_date','sell','refund','orders','total_sell','total_courses','total_sell_count','total_refund','sell_percent','latest_order','numberOfGuests','orders_service'));

    }

    // User List
    public function userList(){

        
        $users = User::orderBy('name', 'asc')->get();

        return view('admin.users.index', compact('users'));
    }

    // User Create
    public function userCreate(){

        $roles = Role::latest()->get();
        return view('admin.users.create',compact('roles'));
    }


    // User Store
    public function userStore(Request $request)
    {

        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8',
            'role_id'   => 'required',
        ]);


        $user = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->role     = $request->role_id;
        $user->save();


        return redirect()->route('users.index')->with('success', __("Created Successfully") );
    }

    public function userEdit($id){

        $user = User::find($id);
        $roles = Role::latest()->get();
        return view('admin.users.edit',compact('user','roles'));
    }


    public function userDetaile($id)
    {
        $user = User::find($id);
        return view('admin.users.details',compact('user'));
    }

    public function userUpdate(Request $request,$id)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email',
            'role_id'   => 'required',
        ]);

        $user = User::find($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->role     = $request->role_id;
        $user->save();


        $user_permission = UserPermission::where('user_id',$id)->get()->each->delete();

        $role_permission = RolePermission::where('role_id',$request->role_id)->get();

        foreach ($role_permission as $permission) {

            $per           = new UserPermission();
            $per->user_id  = $id;
            $per->model    = $permission->model;
            $per->action   = $permission->action;
            $per->save();

        }


        return redirect()->route('users.index')->with('success',__("Updated Successfully"));

    }


    public function userPermission(Request $request)
    {
        $ex_permission = UserPermission::where('user_id',$request->user_id)->where('model',$request->module_name)->get()->each->delete();
        if (isset($request->read)) {

            $permission           = new UserPermission();
            $permission->user_id  = $request->user_id;
            $permission->model    = $request->module_name;
            $permission->action   = 'read';
            $permission->save();
        }

        else{

            $user_permission = UserPermission::where('user_id',$request->user_id)->where('model',$request->module_name)->where('action','read')->first();
            if ($user_permission != null) {
                $user_permission->delete();
            }
        }

        if (isset($request->create)) {

            $permission           = new UserPermission();
            $permission->user_id  = $request->user_id;
            $permission->model    = $request->module_name;
            $permission->action   = 'create';
            $permission->save();
        }

        else{

            $user_permission = UserPermission::where('user_id',$request->user_id)->where('model',$request->module_name)->where('action','create')->first();
            if ($user_permission != null) {
                $user_permission->delete();
            }
        }



        if (isset($request->edit)) {

            $permission           = new UserPermission();
            $permission->user_id  = $request->user_id;
            $permission->model    = $request->module_name;
            $permission->action   = 'edit';
            $permission->save();
        }

        else{

            $user_permission = UserPermission::where('user_id',$request->user_id)->where('model',$request->module_name)->where('action','edit')->first();
            if ($user_permission != null) {
                $user_permission->delete();
            }
        }



        if (isset($request->delete)) {

            $permission           = new UserPermission();
            $permission->user_id  = $request->user_id;
            $permission->model    = $request->module_name;
            $permission->action   = 'delete';
            $permission->save();
        }

        else{

            $user_permission = UserPermission::where('user_id',$request->user_id)->where('model',$request->module_name)->where('action','delete')->first();
            if ($user_permission != null) {
                $user_permission->delete();
            }
        }



        if (isset($request->assigne)) {

            $permission           = new UserPermission();
            $permission->user_id  = $request->user_id;
            $permission->model    = $request->module_name;
            $permission->action   = 'assigne';
            $permission->save();
        }

        else{

            $user_permission = UserPermission::where('user_id',$request->user_id)->where('model',$request->module_name)->where('action','assigne')->first();
            if ($user_permission != null) {
                $user_permission->delete();
            }
        }




        if (isset($request->import)) {

            $permission           = new UserPermission();
            $permission->user_id  = $request->user_id;
            $permission->model    = $request->module_name;
            $permission->action   = 'import';
            $permission->save();
        }

        else{

            $user_permission = UserPermission::where('user_id',$request->user_id)->where('model',$request->module_name)->where('action','import')->first();
            if ($user_permission != null) {
                $user_permission->delete();
            }
        }




        if (isset($request->export)) {

            $permission           = new UserPermission();
            $permission->user_id  = $request->user_id;
            $permission->model    = $request->module_name;
            $permission->action   = 'export';
            $permission->save();
        }

        else{

            $user_permission = UserPermission::where('user_id',$request->user_id)->where('model',$request->module_name)->where('action','export')->first();
            if ($user_permission != null) {
                $user_permission->delete();
            }
        }

        return  response(__('User Action Updated'));

    }



     // User Delete
    public function userDestroy($id){

        $user = User::find($id);

        $user->delete();

        return back()->withSuccess('User deleted');
    }

    public function myProfile(){

        return view('admin.users.my-profile');
    }

    // My Profile
    public function myProfileUpdate(Request $request){

        $user = User::find($request->id); 

        if($request->account_image)
        {
            $image = $request->file('account_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/users');
            $image->move($destinationPath, $name);
            $user->profile_photo_path =  'uploads/users/'.$name;  
        }

        $user->name    = $request->name;
        $user->email   = $request->email;
        $user->phone   = $request->phone;
        $user->address = $request->address;
        $user->city    = $request->city;
        $user->website = $request->website;
        $user->about   = $request->about;
        $user->country = $request->country;
        $user->save();

        // return $user;


        return back()->with('success', 'Profile information updated');


    }

    public function passwordUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id); 

        if (!(Hash::check($request->get('oldpass'), $user->password))) {
            return response()->json(['wrong' => 'Your current password does not matches with the password you provided. Please try again.'], 200);
        }

        if(strcmp($request->get('oldpass'), $request->get('newpass')) == 0){
            return response()->json(['wrong' => 'New Password cannot be same as your current password. Please choose a different password.'], 200);
        }

    
        $user->password = bcrypt($request->get('newpass'));
        $user->save();

        return response()->json(['success' => 'Password changed successfully.'], 200);

    }



    public function bulkSubscribtionEmail(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        $subscribers = Subscriber::all();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new SubscriberAdminEmail($request->subject,$request->message));
        }

        return back()->with('success',__('Email send succesfully'));

    }


    public function insta()
    {
        $datas =  request()->all();

        Log::info($datas);

        // $old_data = Instagram::all()->each->delete();

        // foreach ($datas as $data) {
            
        //     $instagram = new Instagram();
        //     $instagram->link = $data['link'];
            
        //     if ($data['iamge']) {
        //         $image      = $data['iamge'];
        //         $filename   = hexdec(uniqid()) . '-insta.' . $image->getClientOriginalExtension();
        //         $location   = public_path('uploads/instagram/');
        //         $image->move( $location, $filename);
        //         $instagram->image = 'uploads/instagram/'.$filename;
        //     }
        //     $instagram->save();
        // }


    }


}
