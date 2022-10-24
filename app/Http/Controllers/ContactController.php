<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\ContactGallery;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactUpdateRequest;
use App\Http\Requests\ContactMessageRequest;
use App\Mail\ClientMail;
use App\Mail\UserMessageMail;
use Validator;

class ContactController extends Controller
{

    /**
     * Construct
     */


    public function __construct()
    {
        $this->middleware('auth')->only('index');
        $this->middleware('permission:contact,read')->only('index');
        $this->middleware('permission:contact,edit')->only('edit');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contacts.index',[
            'contacts' => Contact::first(),
            'current_locale' => app()->getLocale(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ContactUpdateRequest $request, $id)
    {
        $contact = Contact::find($id);

        $contact->update($request->except('_token') + ['updated_at' => Carbon::now()]);

        if($request->hasFile('banner_image')){
            $image     = $request->file('banner_image');
            $fileName  = uniqid() .'.'. $image->extension();
            $location  = public_path('uploads/contacts');
        $image->move($location, $fileName);
            $contact->banner_image = $fileName;
        }

        $contact->save();

        return redirect()->route('contacts.index')->withSuccess( __("Updated Successfully") );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function message_destroy($id)
    {
        ContactMessage::find($id)->delete();

        return redirect()->route('message.index')->with('error',  __("Message Deleted") );
    }


    public function messages()
    {
        return view('admin.contacts.message',[
            'messages' => ContactMessage::all(),
        ]);
    }

    public function message_show($id)
    {
        return view('admin.contacts.message_show',[
            'message' => ContactMessage::find($id),
        ]);
    }

    public function mass_delete(Request $request)
    {
        $messages = ContactMessage::findMany($request->ids);
        $messages->each->delete();
        return response()->json(['success' => 'done']);
    }

    public function messageDateFilter(){
        $messages = ContactMessage::whereBetween('created_at', [request()->start_date, request()->end_date])->paginate(10);
        return view('admin.contacts.message', compact('messages'));

    }

    public function contact_message(ContactMessageRequest $request)
    {

        $msg = ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        if (getEmailSetting()) {

            Mail::to($request->email)->send(new UserMessageMail());
        }


        return response()->json(['success' => '200' , 'message' => __("Thanks For Your Message") ]);
    }

    // public function contact_gallery()
    // {
    //     return view('admin.contacts.galleries',[
    //         'galleries' => ContactGallery::all(),
    //     ]);
    // }

    // public function gallery_mass_delete(Request $request)
    // {
    //     $galleries = ContactGallery::findMany($request->ids);
    //     $galleries->each->delete();
    //     return response()->json(['success' => 'done']);
    // }

    // public function galleryDateFilter(){
    //     $galleries = ContactGallery::whereBetween('created_at', [request()->start_date, request()->end_date])->paginate(10);
    //     return view('admin.contacts.galleries', compact('galleries'));

    // }

    // public function gallery_destroy($id)
    // {
    //     ContactGallery::find($id)->delete();

    //     return back()->with('error', 'Message Deleted');
    // }

}
