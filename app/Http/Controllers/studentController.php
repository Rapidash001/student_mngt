<?php

namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;
use App\Models\student;

class studentController extends Controller
{
    public function index()
    {
        $students = students::get();

        return view ('student.index', compact('students'));
    }

    public function create()
    {
        return view ('student.create');
    }

    public function store (Request $request) 
    {
        $request -> validate([
            'fname' => 'required|max:255|string',
            'mname' => 'required|max:255|string',
            'lname' => 'required|max:255|string',
            'age' => 'required|integer',
            'address' => 'required|max:255|string',
            'zip' => 'required|integer|max:4',
        ]);
        students::create ($request -> all());

        return view('student.create');
    }

    public function edit()
    {
        return view ('student.edit');
    }

    public function update(Request $request, int $id) {
        {
            $request->validate([
                'fname' => 'required|max:255|string',
                'lname' => 'required|max:255|string',
                'mname' => 'required|max:255|string',
                'age' => 'required|integer',
                'address' => 'required|max:255|string',
                'zip' => 'required|integer',
                
            ]);
        
            students::findOrFail($id)->update($request->all());
            return redirect ()->back()->with('status','Student Updated Successfully!');
            }
    }

    public function destroy(int $id){
        $students = students::findOrFail($id);
        $students->delete();
        return redirect ()->back()->with('status','Student Deleted');
    }
}
