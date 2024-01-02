<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Dashboard</title>
    @yield('styles')
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #9fd7a7;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #76d265;
            color: #fff;
            height: 100vh;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            position: fixed;
            padding-bottom: 10px;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar-header {

            padding-top: 35px;
            font-size: 20px;
            font-weight: bold;
            background-color: #126213;
            width: 100%;
            height: 90px;
            text-align: center;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            /* text-align: center; */
            flex: 1;
        }

        .sidebar-menu li {
            padding: 10px 0;
            padding-left:10px; 
        }

        .sidebar-menu li a {
            text-decoration: none;
            color: #0b340c;
            font-weight: 700;
            display: block;
            font-size: 16px;
            padding: 10px;
            transition: background-color 0.3s ease;
        }

        .special{
            background-color: #f1f1f1;
            color: #126213;
            font-size: 17px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        .sidebar-footer {
            padding: 5px;
            text-align: center;
            
            color: #000000;
            background: white;
        }



        /* Navbar */
        .navbar {
            background-color: #126213;
            color: #fff;
            display: flex;
            align-items: center;
            height: 90px;
            z-index: 5;
            padding: 0 20px;
            border-radius: 0;
        }

        .navbar-heading {
            font-size: 26px;
            text-align: center;
            font-family: 'Nunito Sans', sans-serif;

            flex: 1;
        }

        .logout-button {
            color: #fff;
            text-decoration: none;
            padding: 8px 15px;
            background-color: #dc3545;
            border-radius: 5px;
            margin-left: 15px;
        }

        /* Media query for responsive design */
        @media screen and (max-width: 768px) {
            .sidebar {
                width: 100%;
            }

            .main-content {
                margin-left: 0;
            }
        }

        #image {
            position: fixed;
            width: 400px;
            right: 10%;
            z-index: -1;
            mix-blend-mode: color-burn;
            top: 40%;
            opacity: 40%;
            box-shadow: #09440c;
            transform: rotate(-30deg);
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            Dashboard
        </div>
        <ul class="sidebar-menu">
            <br>
            <li><a class="sbtn" href="/admin/universityindex">➤&nbsp;  Universities</a></li>
            <li><a class="sbtn" href="/admin/courselist">➤ &nbsp; View Courses</a></li>
            <li><a class="sbtn" href="/admin/templateindex">➤ &nbsp; Templates</a></li>
        </ul>
        <div class="sidebar-footer">
            &copy; 2023 Your Company
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" style="margin-left: 250px;">
        <!-- Navbar -->
        <nav class="navbar">
            <div class="navbar-heading">
                <p>Instant Convert</p>
            </div>
            <a class="logout-button" href="/logout">Logout</a>
        </nav>
        <!-- Add your content here -->
        @yield('adminworkspace')
    </div>

    @yield('scripts')
    <img id="image" src="/images/greengear.png" alt="">


</body>
    <script>
        const btn = document.querySelectorAll('.sbtn');
        btn.forEach(element => {
           element.addEventListener('Click',()=>{
            document.querySelector('.special').classList.remove('.special');
            element.classList.add('.special');
           });
        });
    </script>



</html>
