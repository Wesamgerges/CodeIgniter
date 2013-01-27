<select size="5" id="tempaltes" style="width : 150px">
    <?php foreach ($templates as $template){?>
		<option value="<?php echo $template->id ?>"><?php echo $template->name ?></option>
    <?php }?>
</select>