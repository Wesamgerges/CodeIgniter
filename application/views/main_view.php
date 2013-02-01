<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> ChMS Main Page </title>
        <link href="include/CSS/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
        <link href="include/bootstrap/css/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
        <link href="include/bootstrap/css/bootstrap-responsive.min.css" media="all" rel="stylesheet" type="text/css" />
        <!-- HTML5 shim for IE backwards compatibility -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>  
        <!------ Get the header bar ---------->
        <nav class="navbar navbar-inverse">
            <div class="navbar-inner">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="#">ChMS</a>
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
                            <a href="#"><strong>User2</strong></a>
                        </li>
                        <li class="">
                            <a href="login/logout">
                                <img src="include/images/bluemanmxxl.png" width="25px"> Logout</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>  
        <?php
        $XDimension = 3;
        $YDimension = 2;
        ?>	
        <!------- Table Contains the Page ----------->
        <table border="0" width="95%" height="75%" style="position:absolute">
            <tr>
                <td align="center">
                    <!------- Table Contains the Icons ----------->
                    <table class="" align="center" border="0" >
                        <?php for ($i = 0; $i < $YDimension; $i++) { ?>
                            <tr>
                                <?php for ($j = 0; $j < $XDimension && count($MainIcons) > ($k = $i * $XDimension + $j); $j++) { ?>

                                    <td align="center" width="180" height="180">
                                        <div align="center" >
                                            <a href="<?php echo $MainIcons[$k]->link ?>" class="mainIconLink">
                                                <table>
                                                    <tr>
                                                        <td height="150px">
                                                            <img class="mainIcons" src="include/images/<?php echo $MainIcons[$k]->logo ?>" width="128px" height="128px" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div align="center"> <?php echo $MainIcons[$k]->name ?> </div>
                                                        </td>
                                                    </tr>
                                                </table>			        							        													        			
                                            </a>

                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </table>
                    <!--- End Of Icon Table  ---->
                </td>
            </tr>
        </table>
        <!--- End Of Page Table  ---->
        <script src="//code.jquery.com/jquery.js"></script>
    </body>
</html>