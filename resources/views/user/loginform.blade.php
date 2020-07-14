<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Log in</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">


</head>

<body>

    <div id="login-page">
        <div class="container">
            <form class="form-login" action="{{route('checklogin')}}" method="post">

                <h2 class="form-login-heading">Log in now</h2>
                <div class="login-wrap">
                    <p style="color:orangered !important" align="center">
                        @if(Session::has('msg'))

                        {{Session::get('msg')}}

                        @endif
                    </p>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="email" class="form-control" name="user_email" placeholder="User Email" autofocus>
                    <br>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <label class="checkbox">

                    </label>
                    <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> LOG IN</button>
                    <p>If you don't have any account? <a href="{{url('register')}}">Register</a> </p>
                </div>
            </form>
        </div>
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("img/login-bg.jpg", {
            speed: 500
        });
    </script>
</body>

</html>