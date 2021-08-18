<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Resources\ActivityResource;
use Illuminate\Http\Request;

class GetDataController extends Controller
{
       public function tabledata()
    {   
        

        $activity = Activity::all();

        return view('table', compact('activity'));
    }

    public function destroy(Activity $activity)
    {    
        $activity->delete();
        session()->flash('success', 'OJT Activity Deleted Succesfully!');
        return redirect('table');

    }

    
}
