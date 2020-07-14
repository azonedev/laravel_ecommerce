<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice Blade Template</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        menu {
            display: block;
            background: black;
            width: 100%;
            height: 50px;
        }

        li {
            margin-left: 100px;
            display: inline-block;
            padding: 10px;
            float: left;
        }

        a {
            color: blanchedalmond;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            font-weight: 500;
            text-decoration: none;
            text-transform: capitalize;
        }

        .content {
            padding: 100px;
            background: #ddd;
        }

        h2 {
            font-family: arial;
            color: #2a33a7;
        }

        p {

            padding: 20px 0px;
            font-family: arial;
            font-size: 20px;
            letter-spacing: 2px;
            color: #560101;
        }


        button {
            border: none;
            padding: 15px 30px;
            color: white;
            background: orangered;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <menu>
        <ul>
            <li><a href="{{url('/home')}}">Home</a></li>
            <li><a href="{{url('/contract')}}">Contract</a></li>
            <li><a href="{{url('/about')}}">about</a></li>
        </ul>
    </menu>
    <div class="content">
        @yield('content');
    </div>
</body>

</html>