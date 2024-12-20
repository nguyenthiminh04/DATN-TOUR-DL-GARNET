<?php

namespace App\Http\Controllers;

use App\Models\Tour_Guide;
use Illuminate\Http\Request;

class TourGuideController extends Controller
{
    public function index(){
        $tour_guide = Tour_Guide::with(['tour', 'user'])->get();
        return view('admin.tour_guide.index', compact('tour_guide'));
    }
}
