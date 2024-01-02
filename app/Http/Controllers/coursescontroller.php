<?php

namespace App\Http\Controllers;

use App\Models\courses;
use Illuminate\Http\Request;

class coursescontroller extends Controller
{
    public function show(courses $cor)
    {
        $cor = courses::all();
        return view('admin.courses.index', ['courses' => $cor]);
    }
    public function create(){
        return view('admin.courses.add');
    }

    public function store(Request $request)
    {
        courses::create(['name'=> $request->name]);
        return redirect('/admin/courselist')->with('success', 'Course added successfully.');
    }

    public function delete($id, courses $con)
    {
        $con = Courses::find($id);
        $con->delete();
        return redirect('/admin/courselist')->with('success','Course Deleted Succesfully.');
    }
    public function edit(courses $con,$id)
    {
        $con = courses::find($id);
        return view('admin.courses.edit', ['course' => $con]);
    }

    public function update($id, courses $con, Request $req)
    {
        $con = courses::find($id);
        $con->name = $req->get('name');
        $con->save();
        return redirect('/admin/courselist')->with('success','Course updated Succesfully.');
    }
    public function test(){
        return view('admin.courses.test');
    }
}
