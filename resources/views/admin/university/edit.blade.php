<!-- resources/views/admin/universities/edit.blade.php -->
@extends('admin.dashboard')

@section('styles')
    <style>
          .main {
            margin: 2% auto;
            max-width: 800px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        .university-form {
            width: 100%;
            max-width: 500px;
            /* Set the maximum width of the form */
            margin: 0 auto;
            /* Center the form horizontally */
            padding: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-wrap: wrap;
            padding: 10px;
            justify-content: space-between;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            flex: 0 0 100%;
            /* Adjust the width of the input fields */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            padding: 8px 20px;
            background-color: #2d6c21;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .course-list {
            display: flex;
            flex-direction: column;
            /* flex-wrap: wrap; */
            width: 100%;
            margin-top: 10px;
        }

        .container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 18px;
            line-height: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            flex-basis: 10%;
            /* Adjust the width of each course item */
        }

        /* Hide the browser's default checkbox */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 22px;
            width: 22px;
            background-color: #eee;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        /* On mouse-over, add a grey background color */
        .container:hover .checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .container input:checked~.checkmark {
            background-color: #3b8f2a;
            border-color: #1a9833;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .container input:checked~.checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .container .checkmark:after {
            left: 7px;
            top: 3px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        a {
            display: inline-block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
@endsection

<!-- Rest of the Blade content remains unchanged -->



@section('adminworkspace')
    <div class="main">

        <form action="/admin/updateuniversity/{{$university->id}}" method="POST" class="">
            <div style="display: flex; justify-content:space-between;">
                <div><h1>Update University</h1></div>
                <div> <button type="submit">Update university</button></div>
                </div><br>
            @csrf
            <div class="form-group">
                <label for="name">University Name:</label>
                <input type="text" name="name" id="name" value="{{ $university->name }}" required>
            </div>
            <div class="form-group">
                <label>Choose Courses:</label>
                <input type="text" id="courseSearch" placeholder="Search courses...">
                <div class="course-list">
                    @php
                        $universityCourses = json_decode($university->courses);
                    @endphp
                    @foreach ($courses as $course)
                        <label class="container">
                            <input type="checkbox" name="courses[]" value="{{ $course->id }}"
                                @if (in_array($course->id, $universityCourses))
                                    checked
                                @endif
                            >
                            <span class="checkmark"></span>
                            {{ ucfirst($course->name) }}
                        </label>
                    @endforeach
                </div>
            </div>
        </form>
    </div>
@endsection


@section('scripts')
    <script>
        // Function to filter courses based on search input
        function filterCourses() {
            const searchInput = document.getElementById('courseSearch').value.toLowerCase();
            const courseList = document.getElementsByClassName('container');

            for (const course of courseList) {
                const courseName = course.textContent.toLowerCase();
                if (courseName.includes(searchInput)) {
                    course.style.display = 'block';
                } else {
                    course.style.display = 'none';
                }
            }
        }

        // Add event listener to the search input
        document.getElementById('courseSearch').addEventListener('input', filterCourses);

        // Other script code as before...
    </script>
@endsection
