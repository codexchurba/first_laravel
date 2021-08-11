<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class GetDataController extends Controller
{
       public function tabledata()
    {
        $activity = Activity::all();
        return view('table', ['activity'=> $activity]);
    }
    

    
}
