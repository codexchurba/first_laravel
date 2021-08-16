<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class GetDataController extends Controller
{
       public function tabledata()
    {   
        
        $activity = Activity::latest()->paginate(10);
    

        return view('table', compact('activity'))
                ->with('i',(request()->input('page',1)-1)*10);
    }
    

    
}
