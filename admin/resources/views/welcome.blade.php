<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('welcome.name', 'RoV eSports Website') }}</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        
        h2   {
            text-align: center;
        }

        .jumbotron {
            background: #283747;
            color: white;
            text-shadow: 1px 2px black;
        }

        p {
            font-size: 20px;
            font-weight: bold;
        }

        .btn {
            width: 35%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            opacity: 0.90;
            margin: 5px 0;
            display: inline-block;
            font-size: 17px;
            line-height: 20px;
            text-decoration: none; /* remove underline from anchors */
        }

        .google {
            background-color: #dd4b39;
            color: white;
        }

        .container {
            text-align:center;
        }
        


    </style>


</head>

<body>
    <div id="app">
    
        <div class="jumbotron">
            <h2>RoV eSports Website for Admin</h2>      
        </div>

        
        <div class="container">

            <div class="center">

                <p>Please Login</p>

                <a href="{{route('login.google')}}" class="google btn">
                    <i class="fa fa-google fa-fw"></i>
                    Login with Google+
                </a>

            </div>

        </div>
        
    </div>
</body>
</html>
