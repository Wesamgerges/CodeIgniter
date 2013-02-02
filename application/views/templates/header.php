<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> <?php echo $title; ?> </title>
        <link href="include/CSS/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
        <link href="include/bootstrap/css/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
        <link href="include/bootstrap/css/bootstrap-responsive.min.css" media="all" rel="stylesheet" type="text/css" />
        <!-- HTML5 shim for IE backwards compatibility -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>    
        
        
        <nav class="navbar navbar-inverse">
            <div class="navbar-inner">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="main">ChMS</a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li class="active"><a href="main">Home</a></li>
                        <li><a href="#">Members</a></li>
                        <li><a href="#">Meetings</a></li>
                                            
                    </ul>
                    <ul class="nav pull-right">
                        <li>
                        </li>
                        <li>
                            <a href="#"><strong><?php echo $currentUser;?></strong></a>
                        </li>
                        <li class="">
                             <a href="login/logout">
                                <img src="include/images/bluemanmxxl.png" width="25px"> Logout</a>
                        </li>
                        
                    </ul>

                </div>
            </div>
        </nav> 