<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=encoding">
                    <link href="include/CSS/stylesheet.css" media="all" rel="stylesheet" type="text/css" />

                    <title> Main Page </title>
            </head>

            <body>  
                <!------ Get the header bar ---------->

                <?php
                $XDimension = 3;
                $YDimension = 2;
                ?>	
                <!------- Table Contains the Page ----------->
                <table border="0" width="95%" height="95%" style="position:absolute">
                    <tr>
                        <td valign="middle" align="center">
                            <!------- Table Contains the Icons ----------->
                            <table class="" align="center" >
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

            </body>
</html>