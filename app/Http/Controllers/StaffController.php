<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Grade;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    //
  
    public function staff()
    {
        $features = Feature::all();
            $staffs = Staff::all();
        return view('staff', compact('staffs'), compact('features'));
    }
}
