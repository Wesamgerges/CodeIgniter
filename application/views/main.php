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