<?php

namespace App\Http\Controllers;

use App\Models\ChangeLog;
use Illuminate\Http\Request;

class ChangeLogController extends Controller
{
    public function index(Request $request)
    {
        $logs = ChangeLog::with('user')->get();
        return view('admin.logs.index', compact('logs'));
    }
}
