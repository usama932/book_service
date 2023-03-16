<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ExtraService;
use App\Models\Section;
use App\Models\User;
use App\Models\OrderService;
use App\Models\OrderExtra;
use App\Models\Order;
use Auth;
use Illuminate\Support\Facades\Session;
use Stripe;
use Response;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Gallery;

class FrontendController extends Controller
{
    public function home(){
        $services = Service::all();
        $setting = Setting::where('name','banner_image')->first();
        $extra_services = ExtraService::all();
        return view('frontend.home',compact('services','extra_services','setting'));
    }
    public function order_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required',
            'home_phone_number' => 'required',
            'address' => 'required',
            'totalbill' => 'required',
        
            ]);
            
        if(!empty($request->totalbill)){
            $totalbills =   explode('$', $request->totalbill);
        
        
        }
                    
        if ($validator->fails())
            {
                return redirect()->back()->with('error','Fill Inputs Correctly');
            }
        else
            {
          
            
          
            
            Stripe\Stripe::setApiKey('sk_test_1IUO2lMwmjt2FwXFOdsPridh');
            $stripe = Stripe\Charge::create([
                "amount" => $totalbills[1] * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment" 
            ]);

            $order  = Order::create([
                'name'                      =>  $request->first_name.' '.$request->last_name,
                'email'                     =>  $request->email,
                'home_phone_number'         =>  $request->home_phone_number,
                'address'                   =>  $request->address,
                'cell_phone'                =>  $request->cell_phone,
                'status'                    =>  '1',
                'how_did_hear'              =>  $request->how_did_hear,
                'total_amount'              =>  $totalbills[1],
                'transaction_id'            =>  $stripe->id,
            ]);

            if(!empty($request->services)){
                $services = $request->services;
                    foreach ($services as $key => $service){ 
                        OrderService::create([
                            'service_id' => $service,
                            'order_id'         => $order->id
                        ]);
                    }
            }
            if(!empty($request->extraservices)){
                $extraservices = $request->extraservices;
                    foreach ($extraservices as $key => $extraservice){ 
                        OrderExtra::create([
                            'extra_id' => $extraservice,
                            'order_id'         => $order->id
                        ]);
                    }
            }

       

            // if(!empty($order) && !empty($stripe) ){
            //     PaymentHistory::create([
            //         'payment_id'    => $stripe->id,
            //         'order_id'      => $order->id
            //     ]);
            // }
            $setting = Setting::where('name','email')->first();
            $to_name = 'Admin';
            $to_email = $setting->value;
            $data = array('name'=>"Admin", "body" => "A test mail");
            Mail::send('mails.order-mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('Received Booking From Xtreme Booking');
            $message->from('xtremebooking@xtremecleanings.online','XTREME BOOKING');
            });
            return redirect()->back()->with('success','Cogratulation..! Booking Successfully');
            }
        
    }
    public function gettestimonial(){
       
        $testimonials = Testimonial::latest()->get();
        return view('frontend.testimonials',compact('testimonials'));
    }
    public function getaboutus()
    {
        return view('frontend.about');
    }
    public function getgallery(){
        $galleries = Gallery::latest()->get();
        return view('frontend.gallery',compact('galleries'));
    }
}