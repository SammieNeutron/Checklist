<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Checklist;

use Session;

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

    	Session::flash('Success', 'Your item has been added to the checklist.');

    	return redirect()->back();

    }

    public function delete($id)
    {
    	$checklist = Checklist::find($id);

    	$checklist->delete();

    	Session::flash('Success', 'Your item has been deleted from the checklist.');

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

    	Session::flash('Success', 'Your item has been updated.');

    	return redirect()->back();
    }

    public function checked($id)
    {
    	$checklist = Checklist::find($id);

    	$checklist->checked = 1;

    	$checklist->save();

    	Session::flash('Success', 'Your item has been checked.');

    	return redirect()->back();
    }
}
