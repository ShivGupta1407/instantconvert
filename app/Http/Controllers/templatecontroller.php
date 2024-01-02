<?php

namespace App\Http\Controllers;
use App\Models\template;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class templatecontroller extends Controller
{
    public function create(){
        return view('admin.template.add');
    }
    public function store(Request $req){
        $temp = new template;
        $temp->name = $req->input('name');
        $temp->code = $req->input('code');
        $temp->save();
        return redirect('/admin/templateindex')->with('success','Template saved Succcessfully');
    }
    public function index(template $template){
        $template = template::all();
        return view('admin.template.index',compact('template'));
    }
    
    public function delete($id,template $temp){
        $temp = template::find($id);
        $temp->delete();
        return redirect('/admin/templateindex')->with('Success',"Deleted Succesfully");
    }
    public function edit($id,template $temp){
        $temp = template::find($id);
        return view('admin.template.edit',compact('temp'));
    }
    public function update($id,template $temp,Request $req){
        $temp = template::find($id);
        $temp->name = $req->input('name');
        $temp->code = $req->input('code');
        $temp->save();
        return redirect('/admin/templateindex')->with('Success',"Updated Succesfully");
    }

    public function test(template $temp){
        $temp = template::find(2);
        $html = $temp->code;
        return view('admin.template.test',compact('html'));
    }
}

