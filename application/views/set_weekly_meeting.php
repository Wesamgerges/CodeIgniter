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
    * ChurchMangementSystem set_weekly_meeting
    * 
    *
    * Set weekly meeting
    * 
    * @package     ChurchMangementSystem
    * @subpackage  Views
    * @category    View
    * @author      Wesam Gerges
    * @link        
    */
     
?>

<?php
/*
 * Created:
 * BY: Wesam Gerges
 * 
 * Set Weekly Meeting Page.
 * Set Weekly Meeting like youth Meeting.
 * 
 * 
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">


        <link href="../include/bootstrap/css/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
        <link href="../include/bootstrap/css/bootstrap-responsive.min.css" media="all" rel="stylesheet" type="text/css" />
        <title> Set Weekly Meeting </title>
        <link href="../include/datepicker/css/datepicker.css" rel="stylesheet">

        <!-- HTML5 shim for IE backwards compatibility -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>
    <body>
        <script src="../include/JS/jquery1.8.js"></script>


        <script src="../include/datepicker/js/bootstrap-datepicker.js"></script>

        <form id="info" name="info" action="Attendance.php" method="get">
            <table align="center" cellpadding="15px">
                <tr>
                    <td>
                        <?php //echo getAllMeetings(); ?>
                    </td>
                </tr>			
                <tr>
                    <td>
                        <!------------ Date Picker ----------------->
                        
                    </td>
                </tr>	
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td>
                                   <div id="datepicker">	
                            <div class=" ">
                                <div class="input-append date " id="dp3" data-date="" data-date-format="mm-dd-yyyy">
                                    <span class="add-on"><i class="icon-th"></i></span>
                                    <input class="" size="16" type="text" value="" id="me">
                                </div>
                            </div>
                            </div>
                                </td>
                                <td>
                                    <input type="button" id="setWeekly" class =" btn "  value=" Take Attenance " style="margin-bottom:5px;font-family:verdana;"/>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="button" id="setWeekly2" class =" btn btn-primary "  value="  Fast Attenance " style="margin-bottom:5px;font-family:verdana;"/>
                                </td>

                            </tr>
                        </table>
                    </td>
                </tr>		
            </table>
            <input type="hidden" id="currentMeetingId" name="currentMeetingId" value="" />
        </form>
       

        <script>
            $(function() {
                
                $('#dp3').datepicker(
                {
                    format:'zz MM z,yyyy',
                    todayBtn: 'linked'
                   
                   
                }
               
            );
             
               
                //inline    
                $('#dp6').datepicker({
                    todayBtn: 'linked'
                });
                $('#dp3').datepicker('show');

                
                $('#dp3')
                .on('changeDate', function(ev){
                  
                });
                 
                $("#setWeekly2").click(function(){
                    alert( $('#dp3').data('date'));
                })
                   
            });
	  
       
        </script>
    </body>
</html>

