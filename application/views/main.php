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
    * ChurchMangementSystem main
    * 
    *
    * Main
    * 
    * @package     ChurchMangementSystem
    * @subpackage  Views
    * @category    View
    * @author      Wesam Gerges
    * @link        
    */
     
?>
<style>
	div{
		color:red;
	}
</style>
<?php
	echo "<div>".validation_errors()."</div>";
	echo form_open();
	echo form_input(array('id'=>'username','name'=>'username'));
	echo form_submit('submit','submit');
	echo form_close();
?>