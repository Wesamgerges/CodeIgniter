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
    * ChurchMangementSystem email_template_view
    * 
    *
    * Email template view
    * 
    * @package     ChurchMangementSystem
    * @subpackage  Views
    * @category    View
    * @author      Wesam Gerges
    * @link        
    */
     
?>
<select size="5" id="tempaltes" style="width : 150px">
    <?php foreach ($templates as $template){?>
		<option value="<?php echo $template->id ?>"><?php echo $template->name ?></option>
    <?php }?>
</select>