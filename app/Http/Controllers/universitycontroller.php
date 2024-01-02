<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courses;
use App\Models\university;
use App\Http\Controllers\length;
use Illuminate\Support\Facades\DB;

class universitycontroller extends Controller
{

   
public function index()
{
    $universities = University::all();
    $courses = courses::all();
    
    return view('admin.university.index', compact('universities', 'courses'));
}

public function create()
{
    $courses = courses::all();
    return view('admin.university.add', compact('courses'));
}

public function store(Request $request)
    {

        $university = new university([
            'name' => $request->input('name'),
            'courses' => json_encode($request->input('courses')),
        ]);
        
        $university->save();
        
        // Redirect back to the create form with a success message
        return redirect('/admin/universityindex')->with('success', 'University added successfully!');
    }
    public function delete($id, university $con)
    {
        $con = university::find($id);
        $con->delete();
        return redirect('/admin/universityindex')->with('success','Course Deleted Succesfully.');
    }
    
    public function edit($id,University $university)
    {
        $university = University::find($id);
        $courses = courses::all();
        return view('admin.university.edit', compact('university', 'courses'));
    }
    public function update(Request $request, University $university)
    {
    
        // Update the university name
        $university->name = $request->input('name');

        // Update the courses associated with the university
        $university->courses = json_encode($request->input('courses', []));
        
        $university->save();

        // Redirect to the index page with a success message
        return redirect('/admin/universityindex')->with('success', 'University updated successfully');
    }
}
