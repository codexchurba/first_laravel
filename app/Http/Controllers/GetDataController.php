<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Resources\ActivityResource;
use Illuminate\Http\Request;

class GetDataController extends Controller
{
       public function tabledata()
    {   
        $paginate = request('paginate', 10);
        $activity = Activity::paginate(10);
        return ActivityResource::collection($activity);
    }

    public function destroy(Activity $activity)
    {    
        $activity->delete();
        session()->flash('success', 'OJT Activity Deleted Succesfully!');
        return redirect('table');

    }

    
}
