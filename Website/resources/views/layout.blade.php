<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #2b5876, #4e4376);
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8);
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        header h1 {
            color: #fbbc3b;
            margin-left: 10%;
        }

        /* Styling for the navigation menu */
        nav ul {
            list-style-type: none;
            display: flex;
            justify-content: flex-end; /* Align to the right */
            gap: 30px; /* Add space between each menu item */
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline-block;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px; /* Adjust padding for better spacing */
            background-color: rgba(0, 0, 0, 0.7); /* Background color for links */
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: rgba(0, 0, 0, 0.9); /* Darker background on hover */
        }


        /* Main Section */
        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex: 1;
            padding: 20px;
        }

        .hero {
            width: 80%;
            padding: 60px 20px;
            color: white;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 20px;
        }

        .hero h2 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2em;
            max-width: 800px;
            line-height: 1.6;
            margin: 0 auto;
        }

        /* Experience & Portfolio Grid */
        .experience-grid, .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 columns */
            gap: 20px;
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .experience-box, .portfolio-box {
            background-color: rgba(255, 255, 255, 0.9);
            color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .experience-box-large, .portfolio-box-large {
            grid-column: span 2; /* This will make the box span across two columns */
        }

        .experience-box h3, .portfolio-box h3 {
            font-size: 1.5em;
            color: #fbbc3b;
            margin-bottom: 10px;
            text-align: center;
        }

        .experience-box p, .portfolio-box p {
            font-size: 1.1em;
            line-height: 1.5;
            margin-bottom: 10px;
            text-align: center;
        }

        /* Footer */
        footer {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 20px;
            text-align: center;
            width: 100%;
        }
        .contact-list {
            list-style-type: none;
            padding: 0;
            margin: 20px 0;
        }

        .contact-list li {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .contact-list a {
            color: #fbbc3b;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-list a:hover {
            color: #ffffff;
        }
        /* Styling for About Me */
        .biodata-grid {
            display: grid;
            grid-template-columns: 1fr; /* Single column layout */
            gap: 20px;
            margin-top: 20px;
            padding: 20px;
            max-width: 800px; /* Adjusting width for better centering */
            margin-left: auto;
            margin-right: auto;
            background-color: rgba(0, 0, 0, 0.5); /* Adding slight transparency */
            border-radius: 10px; /* Rounded corners */
            padding: 30px;
        }

        .biodata-box {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: white;
            text-align: left;
            margin-bottom: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .experience-grid, .portfolio-grid {
                grid-template-columns: 1fr; /* Single column layout on smaller screens */
            }
            header h1, nav ul {
                margin-left: 5%;
                margin-right: 5%;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Personal Page</h1>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/biodata') }}">About Me</a></li>
                <li><a href="{{ url('/pengalaman') }}">Experience</a></li>
                <li><a href="{{ url('/portofolio') }}">Portfolio</a></li>
                <li><a href="{{ url('/contact') }}">Contact Me</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; 2024 Putu Aryasuta Tirta. All Rights Reserved.
    </footer>
</body>
</html>
