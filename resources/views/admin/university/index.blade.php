<!-- resources/views/admin/universities/index.blade.php -->
@extends('admin.dashboard')

@section('styles')
<style>
    .main {
        padding : 2%;
    } 

    .university-list {
        margin: 20px auto;
        border-collapse: collapse;
        width: 100%;
    }

    .university-list th,
    .university-list td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
        background-color: #ffffffac;
    }

    .university-list th {
        background-color: white;
    }

    .university-list tr:hover {
        background-color: #88db86;
    }

    .edit-btn,
    .delete-btn {
        padding: 4px 14px;
        background-color: #39a91d;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
    }

    .delete-btn {
        background-color: #dc3545;
    }

    .edit-btn:hover,
    .delete-btn:hover {
        background-color: #4ee637;
    }

    .add-btn {
        padding: 8px 16px;
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        float: right;
    }
    
    .add-btn:hover {
        background-color: #218838;
    }
    
    .add-link {
            display: inline-block;
            padding: 8px 15px;
            background-color: #258632;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-link:hover {
            background-color: #00b315;
            color: white;
            text-decoration: none;
        }

    
    /* Remove text decoration from links */
    a {
        text-decoration: none;
    }
  

</style>
@endsection

@section('adminworkspace')
<div class="main">
        <div  style="display: flex; justify-content:space-between;">
            <div> <h1>List of Universities with Courses</h1></div>
        <div><a href="/admin/adduniversity" class="add-link">Add New University</a></div>
        </div>

        @if ($universities->count() > 0)
            <table class="university-list">
                <thead>
                    <tr>
                        <th >University Name</th>
                        <th>Courses</th>
                        <th style="min-width: 180px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($universities as $uni)
                        @php
                            $courseIds = json_decode($uni->courses);
                            $courses = \App\Models\courses::whereIn('id', $courseIds)->get();
                            $courseNames = $courses->pluck('name')->implode(', ');
                        @endphp
                        <tr>
                            <td>{{ Str::ucfirst($uni->name) }}</td>
                            <td>{{ ($courseNames) }}</td> 
                            <td>
                                <a href="/admin/edituniversity/{{$uni->id}}" class="edit-btn">Edit</a>
                                <a href="/admin/deleteuniversity/{{$uni->id}}" class="delete-btn">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No universities found.</p>
        @endif

    </div>
@endsection

