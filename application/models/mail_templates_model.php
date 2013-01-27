<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mail_templates_model
 *
 * @author Owner
 */
class mail_templates_model extends CI_Model{
    
    function get_email_templates()
    {
       return $this->db->get(TEMPLATE_TBL)->result();
    }
    
    function SaveTemplate()
    {
        $name       = $this->input->post("name"     );
	$subject    = $this->input->post("subject"  );
        
	if (    get_magic_quotes_gpc()  )
        {
		$template = $this->input->post("template");
        }
	else
        {
		$template = addslashes( $this->input->post("template")  );
        }
        $template_data = array(
                                "name"=>$name,
                                "subject"=>$subject,
                                "template"=>stripslashes($this->input->post("template") )
                                );
        echo $_POST['template'];
        echo  $this->input->post("id");
	
	if( (  $this->input->post("update") == 1  ) ){
            
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
