<?php

namespace App\Http\Controllers;

use App\HolidayPackage;
use App\HolidayPackageDetail;
use App\Mail\BookingNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class HolidayPackageController extends Controller
{
    public function __construct() {
        //check for login user or back to login
        $this->middleware(function ($request, $next) {
            $userId = Session::get('userId');
            if(!$userId){
                return redirect()->route('login');
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Holiday Packages';
        $holiday_packages = HolidayPackage::with('details')->orderBy('order', 'asc')->get();
        return view('admin.holiday_package.list', compact('title', 'holiday_packages'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Holiday Package Add';
        $package = null;
        return view('admin.holiday_package.add', compact('title', 'package'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form
        $messages = [
            'image.max' => 'The :attribute size must be under 2 MB.',
        ];
        $this->validate(
            $request, [
                'country' => 'required|min:2|max:255',
                'place' => 'required|min:2|max:255',
                'image' => 'mimes:jpeg,jpg,png|max:2048',
                'title' => 'required|max:255',
                'hotel' => 'required',
                'order' => 'required|integer',
            ],
            $messages
        );


        //if has image then upload it and
        $fileName = '';
        if ($request->hasFile('image')) {
            $imgStorePath = "/public/upload/blog/";
            $storagepath = $request->file('image')->store($imgStorePath);
            $fileName = basename($storagepath);

        }
        DB::beginTransaction();
        try {
            $holidayPackage = new HolidayPackage();
            $holidayPackage->country = $request->get('country');
            $holidayPackage->place = $request->get('place');
            $holidayPackage->title = $request->get('title');
            $holidayPackage->order = $request->get('order');
            $holidayPackage->description = $request->get('description');
            $holidayPackage->image = $fileName;
            $holidayPackage->save();

            //now save details
            $deatails = $this->processPackageDetatilsData($request);
            $holidayPackage->details()->saveMany($deatails);


            //now commit the transaction
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
            $message = str_replace(array("\r", "\n","'","`"), ' ', $e->getMessage());
            return redirect()->back()->with('error', $message);
        }


        return redirect()->route('admin.holiday-package.index')->with('message', 'Package has been added successfully.');

    }

    private function processPackageDetatilsData($request)
    {


        $packageDetails = [];

        foreach ($request->get('hotel') as $key => $hotelName){
            $index = $key + 1;

            $packages = [];

            foreach ($request->get('package_'.$index) as $key2 => $package){
                $packages[] = [
                    'type'=> $package,
                    'adult' => $request->get('adult_'.$index)[$key2],
                    'child' => $request->get('child_'.$index)[$key2],
                    'infant' => $request->get('infant_'.$index)[$key2],
                    'bookable' => isset($request->get('bookable_'.$index)[$key2]) ? 1 : 0
                ];
            }


            $packageDetails[] = new HolidayPackageDetail(
                [
                'hotel' => $hotelName,
                'packages' => json_encode($packages)
                ]
            );
        }

        return $packageDetails;
    }


//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Item  $item
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//
//    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = HolidayPackage::where('id', $id)->with('details')->first();

        if(!$package){
            abort(404);
        }

        $title = 'Holiday Package Update';
        return view('admin.holiday_package.add', compact('title', 'package'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $holidayPackage = HolidayPackage::findOrFail($id);

        $messages = [
            'image.max' => 'The :attribute size must be under 2 MB.',
        ];
        $this->validate(
            $request, [
            'country' => 'required|min:2|max:255',
            'place' => 'required|min:2|max:255',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|max:255',
            'hotel' => 'required',
            'order' => 'required|integer',
        ],
            $messages
        );


        //if has image then upload it and
        if ($request->hasFile('image')) {
            $imgStorePath = "/public/upload/blog/";
            $storagepath = $request->file('image')->store($imgStorePath);
            $fileName = basename($storagepath);

            //delete old image
            if(strlen($holidayPackage->image)){
                Storage::delete($imgStorePath.$holidayPackage->image);
            }

        }else{
            $fileName = $holidayPackage->image;
        }

        DB::beginTransaction();
        try {
            $holidayPackage->country = $request->get('country');
            $holidayPackage->place = $request->get('place');
            $holidayPackage->title = $request->get('title');
            $holidayPackage->order = $request->get('order');
            $holidayPackage->description = $request->get('description');
            $holidayPackage->image = $fileName;
            $holidayPackage->save();

            //now save details
            $details = $this->processPackageDetatilsData($request);
            //Delete previous hotels and packaes for this holiday package
            HolidayPackageDetail::where('holiday_package_id', $holidayPackage->id)->delete();

            $holidayPackage->details()->saveMany($details);


            //now commit the transaction
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
            $message = str_replace(array("\r", "\n","'","`"), ' ', $e->getMessage());
            return redirect()->back()->with('error', $message);
        }


        return redirect()->route('admin.holiday-package.index')->with('message', 'Package has been updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = HolidayPackage::findOrFail($id);

        $package->delete();

        return redirect()->route('admin.holiday-package.index')->with('message', 'Package has been deleted successfully.');
    }

    /**
     *  Show the list of booking requests
     *
     * @return \Illuminate\Http\Response
     */
    public function bookingList()
    {

        $title = "Holiday Package Booking Request List";
        $data = DB::table('booking_customers')->select('*')->where('status','!=',0)->orderBy('id' , 'desc')->get();
        return view('admin.holiday_package.booking-list', compact('title', 'data'));
    }

    /**
     *  Show the list of booking requests
     *
     * @return \Illuminate\Http\Response
     */
    public function bookingUpdate(Request $httprequest, $id,$status_code)
    {
        $request = DB::table('booking_customers')->where('id',$id)->where('status','!=',0)->first();
        if(!$request){
            abort(404);
        }

        if($request->status > $status_code && $status_code != 0){
            return redirect()->route('admin.holiday-package_booking.list')->with('error','Booking request status can not be downgrade!');
        }

        if($request->status == 4){
            return redirect()->route('admin.holiday-package_booking.list')->with('error','Booking request status can not be update!');
        }
        $pnr_number = $httprequest->query->get('pnr_number',0);
        if($status_code ==2 && $pnr_number){
            DB::table('booking_customers')->where('id',$id)->where('status','!=',0)->update(['status' => $status_code, 'pnr_number' => $pnr_number]);

        }
        else{
            DB::table('booking_customers')->where('id',$id)->where('status','!=',0)->update(['status' => $status_code]);

        }

        //now send email to request customer
        $sendEmail = false;
        $link=false;
        $buttonText='';

        if($status_code ==2 && $pnr_number){
            $sendEmail = true;

            $message = 'Booking order has been approved. Your PNR is '.$pnr_number.'. Click the following button to complete booking process.';
            $link = route('booking-confirmation',Crypt::encrypt($request->id));
            $buttonText = "Complete Payment";
        }
        elseif($status_code == 0){
            $sendEmail = true;
            $message = 'Your Booking order has been canceled. Try again!';
        }elseif($status_code == 4){
            $sendEmail = true;
            $message = 'Your Booking order has been rejected. Try again!';
        }


        if($sendEmail){
            $adultInfo = json_decode($request->adult_info_json, true);
            $toWhom = ($adultInfo['first_name'][1] ?? '').' '.($adultInfo['last_name'][1] ?? '');
            $email = new BookingNotification($toWhom, $message, $link, $buttonText);
            \Helper::sendEmail([$request->email],[],[],$email);
        }

        return redirect()->route('admin.holiday-package_booking.list')->with('success','Booking request Updated.');
    }

/**
     *  Show the details of booking requests
     *
     * @return \Illuminate\Http\Response
     */
    public function bookingDetails(Request $request, $id)
    {
        $booking = DB::table('booking_customers')->where('id',$id)->where('status','!=',0)->first();
        if(!$booking){
            return response()->json(['message' => "Booking not found!"],404);
        }

       $adultsRaw = json_decode($booking->adult_info_json, true);
       $childsRaw = json_decode($booking->child_info_json, true);
       $infantsRaw = json_decode($booking->infant_info_json, true);


       $documents = [];

       $adults = [];
        $i = 0;
        foreach ($adultsRaw['first_name'] as $key => $name){
            $adult = [
                'first_name' => $name,
                'last_name'  => $adultsRaw['last_name'][$key] ?? '',
                'birth_date'  => $adultsRaw['date_of_birth'][$key] ?? '',
                'gender'  => $adultsRaw['gender'][$key] ?? '',
                'country'  => $adultsRaw['country'][$key] ?? '',
                'passport'  => $adultsRaw['passport'][$key] ?? '',
            ];

            $adults[] = $adult;
            $i++;
        }

        //if have any documents
        $documents = $adultsRaw['docs'];


        $childs = [];
        $i = 0;
        if(isset($childsRaw['first_name'])) {
            foreach ($childsRaw['first_name'] as $key => $name) {
                $child = [
                    'first_name' => $name,
                    'last_name' => $childsRaw['last_name'][$key] ?? '',
                    'birth_date' => $childsRaw['date_of_birth'][$key] ?? '',
                    'gender' => $childsRaw['gender'][$key] ?? '',
                    'country' => $childsRaw['country'][$key] ?? '',
                    'passport'  => $childsRaw['passport'][$key] ?? '',
                ];

                $childs[] = $child;
                $i++;
            }
        }

        //if have any documents
        $documents = array_merge($documents, $childsRaw['docs']);

        $infants = [];
        $i = 0;
        if(isset($infantsRaw['first_name'])) {
            foreach ($infantsRaw['first_name'] as $key => $name) {
                $infant = [
                    'first_name' => $name,
                    'last_name' => $infantsRaw['last_name'][$key] ?? '',
                    'birth_date' => $infantsRaw['date_of_birth'][$key] ?? '',
                    'gender' => $infantsRaw['gender'][$key] ?? '',
                    'country' => $infantsRaw['country'][$key] ?? '',
                    'passport'  => $infantsRaw['passport'][$key] ?? '',
                    'document' => $infantsRaw['docs'][$i] ?? '',
                ];

                $infants[] = $infant;
                $i++;
            }
        }
        //if have any documents
        $documents =array_merge($documents, $infantsRaw['docs']);

        $data = [
            'details' => [
                'adults' =>$adults,
                'childs' =>$childs,
                'infants' =>$infants,
                'documents' =>$documents,
            ]
        ];


        return response()->json($data);
    }



    /**
     *  Show the list of booking requests
     *
     * @return \Illuminate\Http\Response
     */
    public function bookingTransaction()
    {
        $title = "Holiday Package Booking Payment List";
        $transactions  = DB::table('booking_transactions')
            ->join('booking_customers', 'booking_transactions.booking_request_id', '=', 'booking_customers.id')
            ->select('booking_transactions.*','booking_customers.status as bstatus','booking_customers.pnr_number as pnr_number')
            ->orderBy('booking_transactions.id' , 'desc')->get();


        return view('admin.holiday_package.booking-transaction-list', compact('title', 'transactions'));
    }


}
