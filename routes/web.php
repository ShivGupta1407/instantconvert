<?php


use App\Http\Controllers\coursescontroller;
use App\Http\Controllers\universitycontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\templatecontroller;
use App\Http\Controllers\Authcontroller;
use App\Models\university;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

route::get('/register',[Authcontroller::class,'loadregister']);
route::post('/register',[Authcontroller::class,'userregister'])->name('userregister');
route::get('/login',function(){
    return redirect('/');
});
route::get('/',[Authcontroller::class,'loadlogin']);
route::post('/login',[Authcontroller::class,'userlogin'])->name('userlogin');
route::get('/logout',[Authcontroller::class,'logout']);


route::group(['middleware'=>['web','checkadmin']],function(){
    route::get('/admin/dashboard',[Authcontroller::class,'admindash']);
    route::get('/admin/deletecourse/{id}',[coursescontroller::class,'delete']);
    route::get('/admin/courselist',[coursescontroller::class,'show']);
    route::post('/admin/updatecourse/{id}',[coursescontroller::class,'update']);
    route::get('/admin/editcourse/{id}',[coursescontroller::class,'edit']);
    route::get('/admin/addcourse',[coursescontroller::class,'create']);
    route::post('/admin/savecourse',[coursescontroller::class,'store']);
    
    
    route::get('/admin/adduniversity',[universitycontroller::class,'create']);
    route::post('/admin/storeuniversity',[universitycontroller::class,'store']);
    route::get('/admin/universityindex',[universitycontroller::class,'index']);
    route::get('/admin/deleteuniversity/{id}',[universitycontroller::class,'delete']);
    route::get('/admin/edituniversity/{id}',[universitycontroller::class,'edit']);
    route::post('/admin/updateuniversity/{id}',[universitycontroller::class,'update']);
    
    route::get('/admin/createtemplate',[templatecontroller::class,'create']);
    
    route::post('/admin/savetemp',[templatecontroller::class,'store']);
    route::post('/admin/updatetemp/{id}',[templatecontroller::class,'update']);
    route::get('/admin/templateindex',[templatecontroller::class,'index']);
    
    route::get('/admin/templatetesting',[templatecontroller::class,'test']);
    route::get('/admin/deletetemplate/{id}',[templatecontroller::class,'delete']);
    route::get('/admin/edittemplate/{id}',[templatecontroller::class,'edit']);
});
route::group(['middleware'=>['web','checkuser']],function(){
    route::get('/dashboard',[usercontroller::class,'userform']);
    route::post('/user/getpdf',[usercontroller::class,'import']);
    route::post('/user/fetchdata/{id}',[usercontroller::class,'fetchdata']);
});

route::get('/test',function(){
    return redirect('test');
});




//user start
