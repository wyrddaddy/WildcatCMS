<script type="text/javascript">
<?php
$count = 0;
$columns = count($this->dataTable);
foreach ($this->dataTable as $key => $row){	
	echo "dataPrimary["  . $row['id'] . "] = {};";
	foreach($row as $elementNum => $value){
		if(is_numeric($elementNum)){
		// need to convert all html strings to remove white space, add slashes and remove all script tags from the code.  This will need to be reversed
		// before submitting back into the database -- preg_replace('/{SCRIPT}', 'script', $dataToDb) -- or maybe have jquery do it?
			echo "dataPrimary[" . $row['id'] . "][" . $elementNum . "] = '" . preg_replace('/script/', '{SCRIPT}', addslashes(preg_replace( '/\s+/', ' ',$value)))  . "';";
			$count += 1;
		}
	}	
}
$count = $count / $columns;
echo 'dataPrimary[0] = {};';
for($i = 0; $i <= $count; $i++){
	echo 'dataPrimary[0][' . $i . '] = "";';
}
?>
</script>
<div align="left">
<h2>User Management Soon To Come</h2>
<span id="error"></span>
<form action="?page=edit-users&process" method="post">
Page:<br />
<select name="users" id="users" class="users">
<option value="0">New User</option>
<?php 
foreach ($this->dataTable as $key => $row){
	echo '<option value="' . $row['id'] . '" >' . $row['name'] . '</option>';
}
 ?>
</select><br /><br />
Description:<br />
<input type="text" name="name" size="60" id="name" /><br /><br />
<input type="hidden" name="stage" id="stage" value="insert" />
<input type="submit" name="submit" value="Submit Content"  /><input type="button" name="cancel" id="cancel" class="content" value="Cancel"  /><input type="submit" name="delete" id="delete" value="Delete"  />

</form>

</div>