<?php

namespace App\Http\Controllers\Client;

use App\Models\Admins\Tour;
use Illuminate\Http\Request;
use App\Models\Admins\Location;
use App\Http\Controllers\Controller;
use App\Models\Admins\Categorys;
use App\Models\Admins\Categoty_tour;

class HomeController extends Controller
{
    //
    public function index(Request $request) {
        $listtour = Tour::orderBYDesc('id')->get();
        $Tourmoinhat = Tour::orderBy('view', 'desc')->take(6)->get();
        $categoryes = Categorys::whereNull('parent_id')->with('children')->get();
        $categories = Categoty_tour::with('tours')->get();
        $locations = Location::where('status', 1)
        ->whereNull('deleted_at') // Kiểm tra chưa bị xóa mềm
        ->inRandomOrder()
        ->take(5)
        ->get();

          return view('client.home',compact('Tourmoinhat','locations','categories','categoryes'));

    }
}
