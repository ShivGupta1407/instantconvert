<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Models\university;
use App\Models\courses;
use App\Models\template;
use PDF;
use Illuminate\Support\Str;
use Dompdf\Dompdf;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class usercontroller extends Controller
{
    public function userform(){

        $template = template::all();
        $university = university::all();
        if(Auth::user() && Auth::user()->is_admin==0){
        return view('user.userpg',['university'=>$university,'template'=>$template]);
        }else{
        return view('login');
        }
    }

    public function fetchdata($id)
    {
        $university = University::find($id);
        $courses = Courses::whereIn('id', json_decode($university->courses))->get();
    
        $str = "<option value=''>Select Courses</option>";
    
        foreach ($courses as $course) {
            $str .= "<option value='" . $course->id . "'>" . $course->name . "</option>";
        }
    
        echo $str;
    }

    public function import(Request $request){
        $uniId = $request->input('universityname');
        $university = university::find($uniId);
        $uniname = $university->name;

        $courseid = $request->input('coursename');
        $course = courses::find($courseid);
        $coursename = $course->name;
        
        $tempid = $request->input('templateid');
        $temp = template::find($tempid);
        $htmltemp = $temp->code;

        $csvFile = $request->file('csvFile');
        $handle = fopen($csvFile->getPathname(),'r');
        fgetcsv($handle); // Skip the header row
        $data=[];
        $style = Str::between($htmltemp,"---stylestart---","---styleend---");
        $body = Str::between($htmltemp,"---bodystart---","---bodyend---");
        $completestr = "";
        while (($row = fgetcsv($handle)) !== false) {
             $data[] = [
                 'name' => $row[0],
                 'class' => $row[1],
                 'percentage' => $row[2],
                 'fathersname' => $row[3],
                 'phone' => $row[4],
             ];
        }

        foreach($data as $d){
            $name = $d['name'];
            $fathersname = $d['fathersname'];
            $percentage = $d['percentage'];
            $phone = $d['phone'];
            $class = $d['class'];

            $rep = str_replace("{studentname}",$name,$body);
            $rep = str_replace("{studentclass}",$class,$rep);
            $rep = str_replace("{studentfathersname}",$fathersname,$rep);
            $rep = str_replace("{studentphone}",$phone,$rep);
            $rep = str_replace("{studentpercentage}",$percentage,$rep);
            $rep = str_replace("{studentcourse}",$coursename,$rep);
            $rep = str_replace("{studentuniversity}",$uniname,$rep);
            $rep = str_replace("{date}",date('m/d/y'),$rep);
            $completestr .= $rep;
        }
        $html = $style.$completestr;
        $pdf = PDF::loadhtml($html);
        $pdf->setPaper('letter', 'landscape');
        return $pdf->stream('certificates.pdf');
    }

}
