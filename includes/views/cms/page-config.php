<script type="text/javascript">
<?php
//print_r($this->secondaryDataTable);
$count = 0;
$columns = count($this->dataTable);
foreach ($this->dataTable as $key => $row){	
	echo 'dataPrimary[' . ($key + 1) . '] = {};';
	foreach($row as $elementNum => $value){
		if(is_numeric($elementNum)){
			echo 'dataPrimary[' . ($key + 1) . '][' . $elementNum . '] = "' . $value  .'";';
		$count += 1;
		}
	}	
}
$count = $count / $columns;
echo 'dataPrimary[0] = {};';
for($i = 0; $i <= $count; $i++){
	echo 'dataPrimary[0][' . $i . '] = "";';
}
foreach ($this->secondaryDataTable as $key => $row){	
	echo "dataSecondary[" . ($key) . "] = {};";
	foreach($row as $elementNum => $value){
		if(is_numeric($elementNum)){
		// need to convert all html strings to remove white space, add slashes and remove all script tags from the code.  This will need to be reversed
		// before submitting back into the database -- preg_replace('/{SCRIPT}', 'script', $dataToDb) -- or maybe have jquery do it?
			echo "dataSecondary[" . ($key) . "][" . $elementNum . "] = '" . preg_replace('/script/', '{SCRIPT}', addslashes(preg_replace( '/\s+/', ' ',$value)))  . "';";
		}
	}	
}
?>
</script>
<h2>Create or Edit Page Display</h2>
<div style="float:left; width:200px">
<table>
<?php 
	echo '<tr>';
	echo '<td><input type="radio" name="data-set" value="0" class="configs" checked="checked" /></td><td>New Page</td></tr>';
foreach ($this->dataTable as $key => $row){
	echo '<tr>';
	echo '<td><input type="radio" name="data-set" value="' . ($key + 1) . '" class="configs" /></td><td>' . $row['uri'] . '</td></tr>';
}

 ?>
 </table>
</div>
<div style="float:left; width:500px; text-align:left">
<form action="?page=page-config&process" method="post">
URL Path (MUST begin and end with "/"):<br />
<input type="text" name="uri" size="60" id="uri" /><br /><br />
Page Title:<br />
<input type="text" name="name" size="60" id="name" /><br /><br />
Page Description (Seen by Search Engines):<br />
<textarea name="description" rows="2" cols="60" id="description"></textarea><br /><br />
Bread-Crumb:<br />
<input type="text" name="crumb" size="60" id="crumb" /><br /><br />
Layout Type:<br />
<select name="layout" id="layout">
	<?php
		$options = unserialize(LAYOUT_NAMES);
		foreach($options as $optName => $option){
			echo '<option value="' . $option . '">' . $optName . ' </option>
			';
		}
	?>
</select><br /><br />
<table width="100%" border="0">
<tr>
	<td>Section 1:<br />
<select name="section1" id="section1">
	<?php
		echo '<option value=""> </option>';
		foreach($this->secondaryDataTable as $optName => $option){
			echo '<option value="' . $option['id']. '">' . $option['description'] . ' </option>';
		}
	?>
</select><br /><br /></td>
    <td>Section 5:<br />
<select name="section5" id="section5">
	<?php
	echo '<option value=""> </option>';
		foreach($this->secondaryDataTable as $optName => $option){
			echo '<option value="' . $option['id'] . '">' . $option['description'] . ' </option>';
		}
	?>
</select><br /><br /></td>
</tr>
<tr>
	<td>Section 2:<br />
<select name="section2" id="section2">
	<?php
	echo '<option value=""> </option>';
		foreach($this->secondaryDataTable as $optName => $option){
			echo '<option value="' .$option['id'] . '">' . $option['description'] . ' </option>';
		}
	?>
</select><br /><br /></td>
    <td>Section 6:<br />
<select name="section6" id="section6">
	<?php
	echo '<option value=""> </option>';
		foreach($this->secondaryDataTable as $optName => $option){
			echo '<option value="' . $option['id'] . '">' . $option['description'] . ' </option>';
		}
	?>
</select><br /><br /></td>
</tr>
<tr>
	<td>Section 3:<br />
<select name="section3" id="section3">
	<?php
	echo '<option value=""> </option>';
		foreach($this->secondaryDataTable as $optName => $option){
			echo '<option value="' . $option['id'] . '">' . $option['description'] . ' </option>';
		}
	?>
</select><br /><br /></td>
    <td>Section 7:<br />
<select name="section7" id="section7">
	<?php
	echo '<option value=""> </option>';
		foreach($this->secondaryDataTable as $optName => $option){
			echo '<option value="' . $option['id'] . '">' . $option['description'] . ' </option>';
		}
	?>
</select><br /><br /></td>
</tr>
<tr>
	<td>Section 4:<br />
<select name="section4" id="section4">
	<?php
	echo '<option value=""> </option>';
		foreach($this->secondaryDataTable as $optName => $option){
			echo '<option value="' .$option['id'] . '">' . $option['description'] . ' </option>';
		}
	?>
</select><br /><br /></td>
    <td>Section 8:<br />
<select name="section8" id="section8">
	<?php
	echo '<option value=""> </option>';
		foreach($this->secondaryDataTable as $optName => $option){
			echo '<option value="' . $option['id'] . '">' . $option['description'] . ' </option>';
		}
	?>
</select><br /><br /></td>
</tr>
</table>



<input type="hidden" name="stage" id="stage" value="insert" />
<br /><br />
<input type="submit" name="submit"  value="Submit Config" /><input type="button" name="cancel" id="cancel" class="config" value="Cancel"  /><input type="submit" name="delete" id="delete" value="Delete"  />

</form>

</div>
<div style="clear:both"></div>