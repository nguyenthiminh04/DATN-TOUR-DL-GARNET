<?php

namespace App\Http\Controllers\Client;

use App\Models\Admins\Tour;
use Illuminate\Http\Request;
use App\Models\Admins\Location;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index(Request $request) {
        $listtour = Tour::orderBYDesc('id')->get();
        $Tourmoinhat = Tour::orderBy('view', 'desc')->take(6)->get();
        $locations = Location::where('status', 1)
        ->whereNull('deleted_at') // Kiểm tra chưa bị xóa mềm
        ->inRandomOrder()
        ->take(5)
        ->get();
          return view('client.home',compact('Tourmoinhat','locations','listtour'));
    }
}
