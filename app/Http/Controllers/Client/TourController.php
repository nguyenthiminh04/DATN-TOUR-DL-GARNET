<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admins\Categorys;
use App\Models\Admins\Location;
use App\Models\Admins\Tour;
use App\Models\BookTour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    // public function index()
    // {
    //     //

    //     $listtour = Tour::orderBYDesc('id')->get();

    //     // dd($listtour);

    //     // $listlocation = Location::query()->get();

    //     return view('client.home', compact('listtour'));
    // }

    public function show(string $id)
    {

        $tour = Tour::query()->findOrFail($id);

        return view('client.tour.detail', compact('tour'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    public function confirm($id)
    {
        $booking = BookTour::findOrFail($id);

        return view('client.tour.confirm', ['booking' => $booking]); // Trả về view confirm
    }

    //     public function confirm($id)
    // {
    //     $booking = BookTour::findOrFail($id); 

    //     return view('client.tour.confirm', ['booking' => $booking]);
    // }

    public function pre_booking($id)
    {
        $tour = Tour::findOrFail($id);



        return view('client.tour.booking', ['tour' => $tour]);
    }

    public  function searchTour(Request $request)
    {
        $query = $request->input('query');
        $tours = Tour::search($query)->paginate(12);
        return view('client.pages.search', compact('tours'));
    }
    public function detailTour($id)
    {
        $data['tour'] = Tour::find($id);
        $data['category'] = Categorys::find($data['tour']->category_tour_id);
        $data['location'] = Location::find($data['tour']->location_id);
        $data['images'] = $data['tour']->images;
        $data['first_image'] = $data['images']->first();
        // dd($data['images']);  

        return view('client.tour.detail', $data);
    }


    public function showTour(){
        return view('client.tour.detail1');
    }
    
}
