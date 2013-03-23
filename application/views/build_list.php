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
    * ChurchMangementSystem build_list
    * 
    *
    * Build list
    * 
    * @package     ChurchMangementSystem
    * @subpackage  Views
    * @category    View
    * @author      Wesam Gerges
    * @link        
    */
     
?>
<table cellspacing="8px" align="center" width="950px" >
    <tr>
        <?php
        $addRow = 0;
        foreach ($Members as $member) {
            if ($addRow++ % 5 == 0) {
                ?>
            </tr>
            <tr>
            <?php } ?>
            <td id="td<?php echo $member->ID ?>" width="20%">

                <input type="checkbox" id="m<?php echo $member->ID ?>" class="tabledata" name="members[]" 
                   value="<?php echo "" . $member->ID . ";#" . $member->FirstName . ";#" . $member->LastName . ";#" . $member->Email . "" ?>" checked=checked/>

                <label title = "<?php echo ($member->Email == "" ? 'no e-mail provided' : $member->Email ); ?>" for="m<?php echo $member->ID ?>" >
                    <?php echo $member->FirstName . " " . $member->LastName; ?> 
                </label>
            </td>
            <td></td>
            <?php
        }
        ?>
    </tr>
</table>

