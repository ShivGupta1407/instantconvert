<!-- resources/views/admin/universities/index.blade.php -->
@extends('admin.dashboard')

@section('styles')
<style>
    .main {
        margin: 2%;
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
    }

    .university-list th {
        background-color: #f2f2f2;
    }

    .university-list tr:hover {
        background-color: #f5f5f5;
    }

    .edit-btn,
    .delete-btn {
        padding: 6px 12px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 5px;
    }

    .delete-btn {
        background-color: #dc3545;
    }

    .edit-btn:hover,
    .delete-btn:hover {
        background-color: #0056b3;
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
    
    /* Remove text decoration from links */
    a {
        text-decoration: none;
    }
</style>
@endsection

@section('adminworkspace')
<div class="main">
        <a href="#" class="add-btn">Add New University</a>
        <h1>List of Universities with Courses</h1>

        @if ($universities->count() > 0)
            <table class="university-list">
                <thead>
                    <tr>
                        <th>University Name</th>
                        <th>Courses</th>
                        <th>Actions</th>
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
                                <a href="#" class="edit-btn">Edit</a>
                                <form action="#" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">Delete</button>
                                </form>
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