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
    .delete-btn:hover {
        background-color: #d5646f;
            text-decoration: none;
            color: white;
    }

    .edit-btn:hover {
        background-color: #4ee637;
        text-decoration: none;
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
        text-decoration: none;
        color: white;
    }
    
    /* Remove text decoration from links */
    a {
        text-decoration: none;
    }
  
    
    </style>
@endsection

@section('adminworkspace')

<div class="main">
   <div style="display: flex; justify-content:space-between;">
   <div> <h1>List of Templates</h1></div>
    <div><a href="/admin/createtemplate" class="add-btn">Add New Template</a></div>
    </div>
    <table class="university-list">
        <thead>
            <tr>
                <th>id</th>
                <th>Template name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($template as $temp)
            <tr>
                <td scope="row">{{ $temp->id }}</td>
                <td>{{ $temp->name }}</td>
                <td>
                    <a href="/admin/edittemplate/{{$temp->id}}" class="edit-btn">Edit</a>
                    <a href="/admin/deletetemplate/{{$temp->id}}" class="delete-btn">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
