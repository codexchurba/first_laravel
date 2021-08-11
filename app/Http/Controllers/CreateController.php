<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function store()
    {    // pagkuha and pagsave ng values from form
         $attributes = request()->validate([
            'title'=> 'required|max:100|unique:activities,title',
            'description' => 'required|max:255',
            'status' => 'required',
            'duedate' => 'required|after:today'
        ]);

        //pagsave sa activities table sa database. di ko sure bakit nagiging plural yung sa table pero dapat plural ang tables
        Activity::create($attributes);

        session()->flash('success', 'OJT Activity added Succesfully!');
        return redirect('table');
    }
    
}

