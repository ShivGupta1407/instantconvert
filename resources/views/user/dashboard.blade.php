<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: hsl(203, 65%, 21%);
            /* Change the background color as desired */
            padding: 12px;
            color: #fff;
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            margin-left: 20px;
        }

        .navbar-menu {
            list-style: none;
            margin: 0;
            padding: 10px;
            display: flex;
            align-items: flex-end;
            margin-right: 0px;
        }

        .navbar-menu li {
            margin-left: 20px;
        }

        .navbar-menu li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease-in-out;
        }

        .navbar-menu li a:hover {
            color: #eaeaea;
            /* Change the hover color as desired */
        }

        .logout-btn {
            padding: 8px 20px;
            background-color: #dc3545;
            /* Change the button background color as desired */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor:grab;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out;
        }

        .logout-btn:hover {
            background-color: #c82333;
            /* Change the hover background color as desired */
        }

        /* Additional Design */
        body {
            background-color: #f5f5f5;
            /* Change the background color as desired */
            overflow-x: hidden;
        }

        .container {
            max-width: 100vw;
        }

        .content {
            flex: 1;
            margin-bottom: 40px;
            /* Add some space between content and footer */
        }

        .footer {
            background-color: #dbdbdb;
            /* Change the footer background color as desired */
            padding: 8px;
            /* Reduce the footer padding */
            text-align: center;
            font-size: 12px;
            /* Reduce the font size */
            color: #777;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
    </style>
    @yield('styles')
</head>

<body>
    <div class="navbar">
        <div class="navbar-brand">Instant Convert</div>
        <ul class="navbar-menu">
            <li><a href="/logout" class="logout-btn">Log Out</a></li>
        </ul>
    </div><br>
    @yield('body')
    <br>
    <footer>
        <div class="footer">
            <p>&copy; 2023 Instant Convert. All rights reserved.</p>
        </div>
    </footer>
    @yield('scripts')
</body>

</html>
