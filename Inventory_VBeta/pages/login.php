<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Inventory Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" id="bs-css" href="../login css/bootstrap-cerulean.min.css">
    <link rel="stylesheet" type="text/css" href="../login css/charisma-app.css">
   <link rel="shortcut icon" href="img/favicon.ico">
    

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
   

</head>
<!--style="background-image:url(../login%20css/images4.jpg);-->
<body style="background-color:#23527c;" >
<div class="ch-container"  >
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header" style="fo">
            <h2 style="color:#FFF;"></h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please login with your Username and Password.
            </div>
            <form class="form-horizontal" action="ajax/check_login.php" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required >
                    </div>
                    <div class="clearfix"></div>

                    <div class="input-prepend">
                       
                    </div>
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- external javascript -->


<script src="../login css/bootstrap.min.js"></script>
<!-- library for cookie management -->

<script src="../login css/jquery.cookie.js"></script>
<!-- for iOS style toggle switch -->

<script src="../login css/jquery.iphone.toggle.js"></script>

<!-- history.js for cross-browser state change on ajax -->
<script src="../login css/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="../login css/charisma.js"></script>

</body>
</html>
