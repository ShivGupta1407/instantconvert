@extends('admin.dashboard')

@section('adminworkspace')
   <div class="main">
       
       <div style="display: flex; justify-content:space-between;">
        <div><h1>List of Courses</h1></div>
        <div><a href="/admin/addcourse" class="add-link">Add New Course</a></div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>@php
                $i = 1;
            @endphp
                @foreach ($courses as $course)
                    <tr>
                        <td class="td-sno">@php echo $i++; @endphp</td>
                        <td>{{ $course->name }}</td>
                        <td class="action-td">
                            <a href="/admin/editcourse/{{ $course->id }}" class="edit-btn">Edit</a>
                            <a href="/admin/deletecourse/{{$course->id}}" class="delete-btn">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
@endsection

@section('styles')
    <style>
        .action-td{
            justify-content: center;
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
    .delete-btn:hover {
        background-color: #d5646f;
            text-decoration: none;
            color: white;
    }

    .edit-btn:hover {
        background-color: #4ee637;
        text-decoration: none;
    }
        .main{
            margin: 2%;
        }
        .button-container {
            text-align: right;
            margin-bottom: 10px;
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

        .table-container {
            width: 100%;
            overflow-x: auto;
            /* text-align: center; Center table content */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Use fixed table layout */
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
        background-color: #ffffffac;/* Wrap text in cells if it exceeds cell width */
        }
        tr:hover {
        background-color: #88db86;
    }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center; /* Center table header */
        }

        .edit-link {
            display: inline-block;
            padding: 8px 15px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }
        .delete-link {
            display: inline-block;
            padding: 8px 15px;
            background-color: #ff0000;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }

        .edit-link:hover {
            background-color: #0056b3;
        }

        .delete-form {
            display: inline-block;
            margin-left: 5px;
        }

        .delete-form button {
            padding: 8px 15px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

    </style>
@endsection
