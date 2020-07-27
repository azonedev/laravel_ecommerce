<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome Mail</title>
	<style>
	    body{
	    	font-family:arial;
	    	background:white;
	    }
	    .logo{
			font-family: 'Hind', sans-serif;
			color: #F8694A;
			text-align: center;
			cursor: pointer;
	    }
	    .logo span{
	    	color:black;
	    }

	    .marked{
	    	color:#F8694A;
	    }
	    h2{
	    	font-size: 25px;
	    	font-weight: normal;
	    }
		hr{
			width: 10%;
		}
		p{
			font-size: 18px;
		}
		.footer_hr{
			width: 4%;
			float: left;
		}
		.footer{
			font-size: 14px;
		}
		.flogo{
			font-style: italic;

		}
	</style>
</head>
<body style="">

	<h1 class="logo">SHOP<span>MAMA</span></h1>
	<hr>
	<p>Hi, {{$username}}<br>
	If you want to login to shopmama.azonedev.com. You must need to know your password and user login email,so check it and stay happy :) </p>

	<h2>Your login password is : <span class="marked">{{$pwd}}</span></h2>
	<h2>Your You Email Is : <span class="marked">{{$email}}</span></h2>
	

	<hr class="footer_hr"> <br>
	<p class="footer">Best Wishes <br>Admin <span class="logo flogo">shop<span>mama</span></span></p>

</body>
</html>