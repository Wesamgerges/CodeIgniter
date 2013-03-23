<?php
 /**
     * Church Managment System
     *
     * An online application to manage churches
     *
     * @package     Models
     * @author      Wesam Gerges
     * @copyright   
     * @license     
     * @link        
     * @since       Version 2.0
     * @filesource
     */
   
   // ------------------------------------------------------------------------
   
   /**
    * ChurchMangementSystem mail_templates_model Class
    * 
    * Extends CI_Model Class
    *
    * This model is to manage emails templates 
    * 
    * @package     ChurchMangementSystem
    * @subpackage  Models
    * @category    Model
    * @author      Wesam Gerges
    * @link        
    */
class mail_templates_model extends CI_Model{
    
      /**
         * Method get_email_templates
         *            
         * Get all email templates from the Database
         *
         * @access  public
         *
         * @return  Array   list of templates 
         */
    function get_email_templates()
    {
       return $this->db->get(TEMPLATE_TBL)->result();
    }
      /**
         * Method SaveTemplate
         *            
         * Saves an email template to the Database
         *
         * @access  public
         *
         * @return  String   Confirmation
         */
    function SaveTemplate()
    {
        $name       = $this->input->post(   "name"     );
	$subject    = $this->input->post(   "subject"  );
        
	if (    get_magic_quotes_gpc()  )
        {
		$template = $this->input->post( "template"  );
        }
	else
        {
		$template = addslashes( $this->input->post( "template"  )  );
        }
        $template_data = array(
                                "name"=>$name,
                                "subject"=>$subject,
                                "template"=>stripslashes($this->input->post(    "template"  ) )
                                );
        echo $_POST['template'];
        echo  $this->input->post(   "id"    );
	
	if( (  $this->input->post(  "update"    ) == 1  ) ){
            
            $this->db->where( "id" , $this->input->post( "id" ) );
            $this->db->update( TEMPLATE_TBL , $template_data );
            return "  Template '" .$name."' Saved Successfully...";					   
		
	}
        else{
            $sqlid = $this->db->insert( TEMPLATE_TBL , $template_data );
            if($sqlid > 0)
                        echo "Template saved as '" .$name."'";
                else {
                        echo "failed to save your template";
                }
						   
	}		
    }
        /**
       * Method previewTemplate
       *            
       * Saves an email template to the Database
       *
       * @access  public
       * @param Integer $id 
       *
       * @return  object  json object
       */
    function previewTemplate($id)
    {
        $this->db->where("id",$id);
        $data = $this->db->get(TEMPLATE_TBL)->row();
        $data2 = array(
                "subject"=>$data->subject,
                "template"=>$data->template
        );
        return json_encode( $data2 );
    }
}

?>
