<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of show all persons
 *
 * @author Wesam Gerges
 */
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<link href="include/css/stylesheet.css" media="all" rel="stylesheet" type="text/css" />

<title>Show All Persons </title>

<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<?php 
    $status = array('Single','Married');
?>
</head>
 <h1 align="center"> Show All Persons </h1>
  <body>
	<table border=1 align="center">
	    <tr class="highLight bold">
	        <td >
	            FirstName
	        </td>
	        <td >
	            LastName
	        </td>
	<!--        <td >
	            DOF
	        </td>
	--->        
	        <td >
	            Phone
	        </td>
	        <td >
	            Email
	        </td>
	         <td >
	            Status
	        </td>
	   </tr>

<?php
$i=1;
foreach ($persons->result() as $person)
{
?>
    <tr class='abc <?php if(($i++)%2 == 0)echo " highLight"; ?>' id='<?php echo $person->FamilyId;?>' >
        <td class='fn'>
            <?php echo $person->FirstName;?>
        </td>
        <td>
            <?php echo $person->LastName;?>
        </td>
<!---        <td>
            <?php echo ".".$person->DOF;?>
        </td>
--->        
        <td>
            <?php
          	if( $person->Phone == "") echo ".";
             	echo $person->Phone;
             ?>
        </td>
        <td>
             <?php 
           	if( $person->Email =="") echo "."; 
            	 echo $person->Email;
             ?>
        </td>
         <td>
            <?php echo  $status[$person->Status-1];?>
        </td>
   </tr>

<?php
}

?>
</table>

<br>
<h3> Click to view details</h3>
<br/>
<div id="message" align="center"></div>
<script language="javascript">
 
$("document").ready(function(){         
    $(".abc").click(function()
    {
         $.post('GetFamilyData.php', {FamilyID:$(this).attr("id")},  
          function(data) {      //$(this).insertAfter();
          $('#message').html(data).hide().slideDown(500);            
           }); 
    })
});
    
</script>

</body>
</html>
