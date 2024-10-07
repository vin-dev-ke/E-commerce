<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }
        .container1 {
            display: flex;
            min-height: 100vh; /* Full viewport height */
        }
        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            min-height: 100vh; /* Ensure the sidebar is always full height */
            display: flex;
            flex-direction: column;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            flex-grow: 1; /* Allow the ul to grow and fill the available space */
        }
        .sidebar ul li {
            padding: 15px;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            transition: background-color 0.3s ease;
        }
        .sidebar ul li a:hover {
            background-color: #555;
        }
        .sidebar ul li a.active {
            background-color: #555;
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa; /* Light background for content */
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container1">
        <!-- Sidebar -->
        <nav class="sidebar">
            <ul>
                <li><a href="#" class="active">Dashboard</a></li>
                <li><a href="#">Category</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>

        <!-- Main content area -->
        <main class="content">
            @yield('content')
        </main>
    </div>
</body>
</html>
