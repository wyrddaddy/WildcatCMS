<?php 
Controller::loadClass('Utilities_File');
Controller::loadClass('Utilities_Image');
$loadDirectories = array('images', 'flash', 'assets', 'documents');
$files = Utilities_File::getFilesInFolder($loadDirectories, true);
function parseFileArray($array, $recursive = false){
	foreach ($array as $key => $value){
		if($value['type'] == 'dir'){
			$fileString .= '<li class="' . $value['fileType'] . ' closed"><span id="' . $value['id'] . '" class="folder-nav dir"><span class="bullet"></span>' . $key . '</span>'; 
		    $fileString .= '<ul class="dir-tree closed">';
			$fileString .= parseFileArray($value);
			$fileString .= '</ul></li>';
		}		
	}
	foreach ($array as $key => $value){
		if($value['type'] == 'file'){
			$fileString .= '<li class="' . $value['fileType'] . '"><span id="' . $value['id'] . '" class="folder-nav file"><span class="bullet"></span>' . $key . '</span></li>';
		}
	}	
	return $fileString;
	
}

function buildJavascriptObject($array){
	
	foreach ($array as $key => $value){
		if($value['type'] == 'dir'){
			$jsString .= 'dataPrimary.' . $value['id'] . ' = { url : "' . $value['url'] . '",modified : "' . $value['modified'] . '", size : "' . $value['size'] . '"};
			';
			$jsString .= buildJavascriptObject($value);
		}
		if($value['type'] == 'file'){
			$jsString .= 'dataPrimary.' . $value['id'] . ' = {';
			$thisKeyEnd = end($value);
			foreach($value as $i => $j){
				$jsString .= $i . ': "' . $j . '",';
			}
			$jsString .= '};';
			/*
			$jsString .= 'dataPrimary.' . $value['id'] . ' = { url : "' . $value['url'] . '",modified : "' . $value['modified'] . '", size : "' . $value['size'] . '"};
			';
			*/
		}
	}	
	
	return $jsString;
}
?>
<script type="text/javascript">
<?php echo buildJavascriptObject($files); ?>
</script>
<div align="left">
<h2>File Manager</h2>
    <div class="dir-tree">
        <ul class="dir-tree">
        <?php echo parseFileArray($files, true); ?>
        </ul>
    </div>
    <div class="dir-browse">
   
   		<div id="quick-icons"></div>
        
    	<div id="loader-bar" style="display:none; text-align:center"><br /><br /><br /><img src="/images/animations/loader-bar.gif" /></div>
    	<div id="folder-grid">
        	<h3>Browsing Folder : <span id="folder-name"></span></h3>
        	<table border="1" width="100%">
            	<thead>
                	<th>File / Folder Name</th><th>Type</th><th>Modified</th><th>File Size</th><th></th>
                </thead>
                
                <tbody id="folder-results">
                
                </tbody>
            </table>
        </div>
        <div id="file-grid">
      		 <p id="file-preview"></p>
             <table border="1" width="100%">
            	<thead>
                	<th>File Data:</th><th>Value</th>
                </thead>
                <tbody id="file-results">
                
                </tbody>
            </table>
        </div>
    
    </div>
    <div class="clear-floats"></div>
</div>