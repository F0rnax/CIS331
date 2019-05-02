<!DOCTYPE html>
<html>
    <head>
        <title>Grand River Marina System</title>
        <link rel="stylesheet" type="text/css"
              href="<?php echo "$home"; ?>main.css" />
    </head>
    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
    <body>

        <div id="master">

            <h1>Grand River Marina System
                <img 
                    border="0"
                    align="right"
                    margin="50"
                    src="<?php echo $logo; ?>"
                    alt="125_logo">
            </h1>
            <br></br>

            <!--            <div id="nav-container-top">
                            <ul>
                                <li><a href="<?php echo $home; ?>">Home</a></li>
                                <li><a href="<?php echo $home; ?>/reservations/?action=display">Reservations</a></li>
                                <li><a href="<?php echo $home; ?>/sailors/">Sailors</a></li>
                                <li><a href="http://www.google.com">Exit</a></li>
                            </ul>
                        </div>-->
            <!-- end div nav-container-top -->
            <!--Week 10 Add JS-->
            <div class="topnav" id="myTopnav">
                <a href="<?php echo $home; ?>">Home</a>
                <a href="<?php echo $home; ?>/reservations/?action=display">Reservations</a>
                <a href="<?php echo $home; ?>/sailors/">Sailors</a>
                <a href="#about">About</a>
                <a href="javascript:void(0);" class="icon" 
                 onclick="myFunction()">&#9776</a>            
            </div>




        </div><!-- end div master -->

