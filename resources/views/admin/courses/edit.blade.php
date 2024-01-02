@extends('admin.dashboard')

@section('adminworkspace')
   <div class="main">
       
       <div class="form-container">
        <div style="display:  flex;
        justify-content: end;"><a href="/admin/courselist" class="add-link">Back To Courses</a></div><br>
           <form action="/admin/updatecourse/{{$course->id }}" method="POST" class="form">
            @csrf
            
            <div class="form-group">
                <h3>Edit Course</h3><br><br>
                <label for="name">Course Name:</label>
                <input type="text" name="name" id="name" value="{{ $course->name }}" required>
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <button class="form-button" type="submit">Update Course</button>
        </form>
    </div>
   </div>
@endsection

@section('styles')
<style>
    h1 {
        color: #1b421d
    }

    .main {
        margin: 2%;
    }

    .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
    }

    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 50px;
        /* text-align: center; */
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .add-link {
            
            padding: 8px 15px;
            background-color: #0b7d05;

            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        
        .add-link:hover {
            text-decoration: none;
            color: white;
            background-color: #45b300;
        }
    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
    }
    .add-link {
        
        padding: 8px 15px;
        background-color: #0b7d05;

        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }
    
    .add-link:hover {
        text-decoration: none;
        color: white;
        background-color: #45b300;
    }


    .form-button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #077b0a;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }

    .form button:hover,
    .form button:active,
    .form button:focus {
        background: #43A047;
    }

    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
    }

    .form .message a {
        color: #4CAF50;
        text-decoration: none;
    }

    .container {
        position: relative;
        z-index: 1;
        max-width: 300px;
        margin: 0 auto;
    }

    .container:before,
    .container:after {
        content: "";
        display: block;
        clear: both;
    }

    .container .info {
        margin: 50px auto;
        text-align: center;
    }

    .container .info h1 {
        margin: 0 0 15px;
        padding: 0;
        font-size: 36px;
        font-weight: 300;
        color: #1a1a1a;
    }

    .container .info span {
        color: #4d4d4d;
        font-size: 12px;
    }

    .container .info span a {
        color: #000000;
        text-decoration: none;
    }

    .container .info span .fa {
        color: #EF3B3A;
    }
</style>
@endsection
