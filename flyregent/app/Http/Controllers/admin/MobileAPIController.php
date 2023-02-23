<?php

namespace App\Http\Controllers;

use App\MobileOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;


class MobileAPIController extends Controller
{
    public function offers() {

        $userId = Session::get('userId');
        if (!isset($userId)) {
            return redirect()->route('login');
        }

        $offers = MobileOffer::orderBy('order','asc')->get();
        $title = 'Mobile Offers';

        return view('admin.mobile_offers.index', compact('title','offers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function offerCreate()
    {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return redirect()->route('login');
        }

        $title = 'Mobile Offer Create';
        return view('admin.mobile_offers.add', compact('title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function offerStore(Request $request)
    {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return redirect()->route('login');
        }
        //validate form
        $messages = [
            'image.max' => 'The :attribute size must be under 2MB.',
            'image.dimensions' => 'The :attribute dimensions must be 380 X 173.',
        ];

        $this->validate(
            $request, [
                'title' => 'required|max:255',
                'subtitle' => 'required|max:255',
                'image' => 'required|mimes:jpeg,jpg,png|max:2048|dimensions:min_width=380,min_height=173,max_width=380,max_height=173',

            ],
            $messages
        );

        if (Input::file('image')) {
            $upload_file = Input::file('image');
            //todo:stsbd change
            $relativePath = "/public/upload/blog/";
            $fileLink = Storage::put($relativePath,$upload_file);
            $file_name = basename($fileLink);

        }else{
            $file_name = '';
        }

        $data = [
            'title' => $request->get('title'),
            'subtitle' => $request->get('subtitle'),
            'order' => $request->get('order'),
            'image' => $file_name,
        ];

        MobileOffer::create($data);

        Session::flash('message', 'Offer has been added successfully');
        Session::flash('message_type', 'success');
        return redirect()->route('admin.mobile.offer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function offerDelete($id)
    {
        $userId = Session::get('userId');
        if (!isset($userId)) {
            return redirect()->route('login');
        }

        $offer = MobileOffer::findOrFail($id);
        $offer->delete();
        Session::flash('message', 'Offer has been deleted successfully');
        Session::flash('message_type', 'success');
        return redirect()->route('admin.mobile.offer');
    }


    public function getOffers() {

        $offers = MobileOffer::orderBy('order','asc')->get();

        $formatedData = [];

        foreach ($offers as $offer){
            $formatedData[] = [
                'title' => $offer->title,
                'subtitle' => $offer->subtitle,
                'image' => \Helper::getImageBaseUrl().'/public/upload/blog/'.$offer->image,
                'order' => $offer->order
            ];
        }

        //allow cors
        header('Access-Control-Allow-Origin: *');
        return response()->json($formatedData);

    }
    public function firstOffer() {

        $offer = MobileOffer::orderBy('order','asc')->first();
        $formatedData = [
                'title' => $offer->title,
                'subtitle' => $offer->subtitle,
                'image' => \Helper::getImageBaseUrl().'/public/upload/blog/'.$offer->image,
                'order' => $offer->order
            ];

        //allow cors
        header('Access-Control-Allow-Origin: *');
        return response()->json($formatedData);

    }



}
