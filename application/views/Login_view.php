<?php
/**
     * Church Managment System
     *
     * An online application to manage churches
     *
     * @package     Views
     * @author      Wesam Gerges
     * @copyright   
     * @license     
     * @link        
     * @since       Version 2.0
     * @filesource
     */
   
   // ------------------------------------------------------------------------
   
   /**
    * ChurchMangementSystem Login_view
    * 
    *
    * Login view
    * 
    * @package     ChurchMangementSystem
    * @subpackage  Views
    * @category    View
    * @author      Wesam Gerges
    * @link        
    */
     
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="include/CSS/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
        <link href="include/bootstrap/css/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
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
                    <img src="include/images/CMS.gif">    
                </td>
            </tr>
        </table>	
    </body>
</html>