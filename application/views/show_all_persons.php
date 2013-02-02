<?php
/**
 * Description of show all persons
 *
 * @author Wesam Gerges
 */
?>
 
          
  <?php 
        $status = array('Single','Married');
    ?>
       <h1 align="center"> Show All Persons </h1>
	<table align="center" class="table table-bordered table-striped" style="width:50%">
	    <tr class=" bold">
	        <th >
	            First Name
	        </th>
	        <th >
	            Last Name
	        </th>
	<!--        <td >
	            DOF
	        </td>
	--->        
	        <th >
	            Phone
	        </th>
	        <th >
	            Email
	        </th>
	         <th >
	            Status
	        </th>
	   </tr>

<?php
$i=1;
foreach ($persons->result() as $person)
{
?>
    <tr class='abc <?php if(($i++)%2 == 0)echo " "; ?>' id='<?php echo $person->FamilyId;?>' >
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
          	if( $person->Phone == "") echo " ";
             	echo $person->Phone;
             ?>
        </td>
        <td>
             <?php 
           	if( $person->Email =="") echo " "; 
            	 echo str_replace (",",",<br/>",$person->Email);
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
