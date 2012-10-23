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
<h2>Create or Edit Content</h2>
<form action="?page=edit-content&process" method="post">
Content Item:<br />
<select name="content" id="content" class="content">
<option value="0">New Content</option>
<?php 
foreach ($this->dataTable as $key => $row){
	echo '<option value="' . $row['id'] . '" >' . $row['description'] . '</option>';
}
 ?>
</select><br /><br />
Name of Content Item (Not displayed on site):<br />
<input type="text" name="description" size="60" id="description" /><br /><br />
Content:<br />
<script type="text/javascript" src="../tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">
	$().ready(function() {
		$('textarea.tinymce').tinymce({
			// Location of TinyMCE script
			script_url : '../tiny_mce/tiny_mce.js',

			// General options
			theme : "advanced",
			plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,advlist",

			// Theme options
			theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,|, bullist,numlist,|,outdent,indent,blockquote,|,undo,redo",
			theme_advanced_buttons2 : "link,unlink,anchor,image,cleanup,code,|,insertdate,inserttime,preview,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,iespell,media,advhr,fullscreen",
		
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,

			// Example content CSS (should be your site CSS)
			content_css : "/css/styles.css",

			// Drop lists for link/image/media/template dialogs
			template_external_list_url : "lists/template_list.js",
			external_link_list_url : "lists/link_list.js",
			external_image_list_url : "lists/image_list.js",
			media_external_list_url : "lists/media_list.js",

			// Replace values for the template plugin
			template_replace_values : {
				username : "Some User",
				staffid : "991234"
			}
		});
	});
</script>
<textarea id="text-editor" name="txtBody" rows="15" cols="90" style="width: 80%" class="tinymce"></textarea>




<!-- <input type="hidden" value="<?php //$content ?>" class="txtBody" name="txtBody" id="txtBody" /> -->
<br /><br />
<input type="hidden" name="stage" id="stage" value="insert" />
<input type="submit" name="submit" value="Submit Content"  /><input type="button" name="cancel" id="cancel" class="content" value="Cancel"  /><input type="submit" name="delete" id="delete" value="Delete"  />

</form>

</div>