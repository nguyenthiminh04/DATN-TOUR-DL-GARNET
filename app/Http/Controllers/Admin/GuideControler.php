<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour_Guide;
use Illuminate\Http\Request;

class GuideControler extends Controller
{
    public function index(){
        $tour_guide = Tour_Guide::with(['tour', 'user'])->get();
        // dd($tour_guide);
        return view('admin.guide_check.index', compact('tour_guide'));
    }
}
