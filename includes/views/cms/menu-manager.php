<script type="text/javascript">
<?php
$menuCategories = unserialize(MENU_CATEGORIES);
$count = 0;
$columns = count($this->dataTable);
foreach ($this->dataTable as $key => $row){	
	echo "dataPrimary["  . $row['id'] . "] = {};";
	foreach($row as $elementNum => $value){
		if(is_numeric($elementNum)){
		// need to convert all html strings to remove white space, add slashes and remove all script tags from the code.  This will need to be reversed
		// before submitting back into the database -- preg_replace('/{SCRIPT}', 'script', $dataToDb) -- or maybe have jquery do it?
			echo "dataPrimary[" . $row['id'] . "][" . $elementNum . "] = '" . addslashes(preg_replace( '/\s+/', ' ',$value))  . "';";
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

<h2>Menu Manager System</h2>
<form action="?page=menu-manager&process" method="post" enctype="multipart/form-data" >
Menu Item(s):<br />
<select name="item" id="item" class="menu-manager">
<option value="0">New Item</option>
<?php 
foreach ($this->dataTable as $key => $row){
	echo '<option value="' . $row['id'] . '" >' . $row['name'] . '</option>';
}
 ?>
</select><br /><br /><input type="hidden" name="imagename" id="imagename" />
Dish Name:<br />
<input type="text" name="name" size="60" id="name" /><br /><br />
Description:<br />
<textarea name="description" id="description" rows="5" cols="50"></textarea><br /><br />
Price:<br />
<input type="text" name="price" size="60" id="price" /><br /><br />
Image:<span id="imagethumb"></span><br />
<input type="file" accept="image/jpeg" name="imageUpload" size="60" /><br /><br />
Category:<br />
<select name="category" id="category">
<?php 
foreach ($menuCategories as $key => $row){
	echo '<option value="' . $key . '" >' . $row . '</option>';
}
 ?>
</select><br /><br />
<input type="hidden" name="stage" id="stage" value="insert" />
<input type="submit" name="submit" value="Submit Content"  /><input type="button" name="cancel" id="cancel" class="content" value="Cancel"  /><input type="submit" name="delete" id="delete" value="Delete"  />

</form>
