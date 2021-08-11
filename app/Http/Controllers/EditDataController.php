<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class EditDataController extends Controller
{
    public function edit($id)
    {    
        $activities = Activity::find($id);
        return view('table.edit',compact('activities'));
    }

    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'title'=> [
                'max:100',
            Rule::unique('Activities')->ignore($activity),
            ],
            'description' => 'max:255',
            'status' => '',
            'duedate' => ''
        ]);

        $activity->update($request->all());

        session()->flash('success', 'OJT Activity Updated Succesfully!');
        return redirect('table');

    }

    
}
