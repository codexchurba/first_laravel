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
        $search = request('search', "");

        $activity = Activity::latest()
        ->search(trim($search))
        ->paginate($paginate);
        return ActivityResource::collection($activity);
    }

    public function destroy(Activity $activity)
    {    
        $activity->delete();
        session()->flash('success', 'OJT Activity Deleted Succesfully!');
        return redirect('table');

    }

    
}
