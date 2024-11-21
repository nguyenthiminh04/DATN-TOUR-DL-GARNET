<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admins\Tour;
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
        
        return view('client.pages.detailtour', compact('tour'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
      
    }

}
