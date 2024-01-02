@section('style')
{{--startstyle--}}
<style>
    /* Certificate CSS */
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
    }
    .certificate-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 2px solid #333;
        background-color: #fff;
    }
    .certificate-header {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .certificate-details {
        font-size: 18px;
        margin-bottom: 10px;
    }
    .certificate-details strong {
        margin-right: 10px;
    }
    .student-details {
        font-size: 18px;
    }
    .student-details strong {
        margin-right: 10px;
    }
    .certificate-footer {
        margin-top: 30px;
        text-align: center;
        font-size: 16px;
    }
</style>
{{--endstyle--}}
@endsection

 @section('layoutbody')
 {{--startbody--}}

 <div class="main">
    <div class="certificate-container">
        <div class="certificate-header">Certificate of Completion</div>
        <div class="certificate-details">
            <strong>University:</strong> {studentuniversity}
        </div>
        <div class="certificate-details">
            <strong>Course:</strong> {studentcourse}
        </div>
        <div class="student-details">
            <strong>Name:</strong> {studentname}
        </div>
        <div class="student-details">
            <strong>Class:</strong> {studentclass}
        </div>
        <div class="student-details">
            <strong>Percentage:</strong> {studentpercentage}
        </div>
        <div class="student-details">
            <strong>Father's Name:</strong> {studentfathersname}
        </div>
        <div class="student-details">
            <strong>Phone:</strong> {studentphone}
        </div>
        <!-- Add more student details or additional fields as needed -->
        <div class="certificate-footer">
            This is to certify that the above-named student has successfully completed the course.
        </div>
    </div>
</div>
{{--endbody--}}
@endsection