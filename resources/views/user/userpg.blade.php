@extends('user.dashboard')
@section('body')

<div class="main-form-userpage" >
    <div style="text-align: center; margin-left:3%;">
        <img id="imageuserdash" style="width: 100%; padding: 10px; " src="/images/svgpic.png" alt="">
        <p style="font-weight: 300; padding:8px; background-color:hsl(203, 65%, 21%);color:white; border-radius:5px ; margin:5px; ">
            <span style="color: red ; font-weight:600; font-size:20px;"># NOTE</span><br>
            "Make sure to add these details in your CSV file with sequence
            Name,Class,Percentage,Father's Name,Phone 
            as column names."
        </p>
    </div>
    <div class="container shadow" style="width:100%; margin-right:8%; margin-left:3%; ">
        <h2 id="test">User Page</h2>
    
        <form action="/user/getpdf" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group">
                <label for="csvFile">Upload CSV File:</label>
                <input style="" type="file" name="csvFile" id="csvFile" accept=".csv">
            </div>
    
            <div class="form-group">
                <label for="universityname">University Name:</label>
                <select name="universityname" id="universityDropdown" required>
                    <option value="">Select a University</option>
                    @foreach ($university as $uni)
                    <option value="{{$uni->id}}">{{$uni->name}}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="form-group">
                <label for="coursename">Select Course:</label>
                <select name="coursename" id="courseDropdown" required>
                    <option value="">Select a course</option>
                </select>
            </div>
    
            <div class="form-group">
                <label for="templateid">Select Template:</label>
                <select name="templateid" id="templateDropdown" required>
                    <option value="">Select a template</option>
                    @foreach ($template as $temp)
                    <option value="{{$temp->id}}">{{$temp->name}}</option>
                    @endforeach
                </select>
            </div>
           <div class="btns">
             <div class="form-group">
                 <button type="submit" class="btn" style="background-color: hsl(203, 65%, 21%);" id="selectTemplatesBtn">Print Certificates</button>
             </div>
           </div>
        </form>
    </div>
</div>

@endsection

@section('styles')
<style>
    .main-form-userpage{
        display: flex; flex-direction:row;
    }
    /* Custom file input styles */
    @media(max-width:700px) {
        .main-form-userpage{
            flex-direction: column;
        }
        .side-bar{
            
        }
        #imageuserdash{
            display: none;
        }
    }
.file-input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.file-input:focus {
    outline: none;
    box-shadow: 0 0 0 2px #f0f0f0;
}

.file-input::file-selector-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 14px;
    padding: 8px 16px;
    cursor: pointer;
}

/* Style when file is selected */
.file-input:focus ~ label {
    box-shadow: 0 0 0 2px #f0f0f0;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 14px;
}

    .preview{
        padding: 10px 20px;
        background-color: green;
        color: white;
        border: none;
        border-radius: 5px;
    }
    .btns{
        display:flex;
        justify-content: space-between;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    h2 {
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    #selectTemplatesBtn {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #selectTemplatesBtn:hover {
        background-color: #0056b3;
    }

</style>

@endsection

@section('scripts')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        }
    });
    $(document).ready(function() {
        $('#universityDropdown').change(function() {
            var conid = $('#universityDropdown').val();
            $.ajax({
                url: '/user/fetchdata/' + conid,
                method: "POST",
                data: {
                    conid: conid
                },
                success: function(data) {
                    $('#courseDropdown').html(data);
                },
                error: function(data) {
                    alert(conid);
                }
            })
        })
    });
</script>
@endsection
