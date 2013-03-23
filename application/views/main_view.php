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
    * ChurchMangementSystem main_view
    * 
    *
    * Main view
    * 
    * @package     ChurchMangementSystem
    * @subpackage  Views
    * @category    View
    * @author      Wesam Gerges
    * @link        
    */
     
?> 
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
       