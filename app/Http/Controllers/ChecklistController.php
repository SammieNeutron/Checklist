<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Checklist;

class ChecklistController extends Controller
{
    public function index()
    {
    	$checklists = Checklist::all();

    	return view('checklist')->with('checklists', $checklists);
    }

    public function create(Request $request)
    {
    	$checklist = new Checklist;

    	$checklist->checklist = $request->checklist;

    	$checklist->save();

    	return redirect()->back();

    }

    public function delete($id)
    {
    	$checklist = Checklist::find($id);

    	$checklist->delete();

    	return redirect()->back();
    }

    public function update($id)
    {
    	$checklist = Checklist::find($id);

    	return redirect()->back();
    }

    public function save(Request $request, $id)
    {
    	$checklist = Checklist::find($id);

    	$checklist->checklist = $request->checklist;

    	$checklist->save();

    	return redirect()->back();
    }
}
