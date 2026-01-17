<!DOCTYPE html>
<html>
<head>
    <title>Event Management System</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        /* Header */
        .header {
            background-color: #2c3e50;
            padding: 15px;
            color: white;
        }

        .header h2 {
            display: inline;
        }

        .nav {
            float: right;
        }

        .nav a {
            text-decoration: none;
            color: white;
            margin-left: 15px;
            padding: 6px 12px;
            border-radius: 4px;
            background-color: #3498db;
        }

        /* .nav a:hover {
            background-color: #2980b9;
        } */

        /* Main Section */
        .main {
            text-align: center;
            margin-top: 120px;
        }

        .main h1 {
            color: black;
        }

        .btn {
            display: inline-block;
            margin: 15px;
            padding: 12px 30px;
            background-color: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #219150;
        }

        /* Footer */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #2c3e50;
            color: white;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>Event Management System</h2>
        <div class="nav">
            <a href="/webtech/project/View/login.php">Log In</a>
            <a href="/webtech/project/View/signup.php">Sign Up</a>
        </div>
    </div>

    <div class="main">
        <h1>Welcome to Our Event Management Platform</h1>
        <p>Plan, manage, and enjoy your events easily</p>

        <a href="/webtech/project/View/dashboard.php" class="btn">View Packages</a>
    </div>

    <div class="footer">
        &copy; 2026 Event Management System
    </div>

</body>
</html>