<?php
/*
 * Login View file 
 * 
 * 
 * @author: Wesam Gerges
 */
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=encoding">
        <link href="include/CSS/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="include/CSS/components.css" title="default">
        <title>Log In</title>
        <script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script>
            var mainPageLocation =  "<?php echo MainPage; ?>";
        </script>
    </head>
    <body>
        <div id="WelcomeMessage" >
            <a href="javascript:Starting();" id="loginlink">login</a>	
        </div>

        <?php include("include/FormLibrary.html"); ?>
        <table width="100%" height="95%">
            <tr>
                <td align="center">           
                    <img src="include/images/cms.gif">    
                </td>
            </tr>
        </table>	
    </body>
</html>