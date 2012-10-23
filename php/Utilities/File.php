<?php
Controller::loadClass('Utilities_Math_File');
/* 

*/ 
class Utilities_File {	
	
	function Utilities_File(){
		
	}
	
	
	function getFilesInFolder($dirArray, $recursive = false){
		foreach($dirArray as $dir){
			$fullDir = SERVER_ROOT . $dir;
			$fileTreeArray[$dir] = Utilities_File::checkDirectory($fullDir, $recursive);
			$fileTreeArray[$dir]['type'] = 'dir';
			$fileTreeArray[$dir]['url'] = '/' . $dir ;
			$fileTreeArray[$dir]['id'] = str_replace('/', '_', '/' . $dir);
			$fileTreeArray[$dir]['fileType'] = 'dir';
			$fileTreeArray[$dir]['name'] = $dir;
		}		
		return $fileTreeArray;
	}
	
	function checkDirectory($fullDir, $recursive = false){
		if(!stristr($fullDir, SERVER_ROOT)) $fullDir = SERVER_ROOT . $fullDir;
		if (is_dir($fullDir)) {
			if ($dh = opendir($fullDir)) {
				while (($file = readdir($dh)) !== false) {
					if($file != '.' && $file != '..'){
						$levelArray[$file] = Utilities_File::getFileData($fullDir, $file);
						if($recursive == true && $levelArray[$file]['type'] == 'dir'){
							$levelArray[$file] = array_merge($levelArray[$file], Utilities_File::checkDirectory($fullDir . '/' . $file, $recursive));	
						}
					}
				}
				closedir($dh);
			}
		}
		
		return $levelArray;
	}
	
	function getFileData($fullDir, $file){
		$sanitize = array('/', '.', '-');
		$fileAndPath = $fullDir . '/' . $file;
		$itemArray['type'] = filetype($fileAndPath);
		$itemArray['modified'] = date("F d Y H:i:s", filemtime($fileAndPath));
		$itemArray['size'] = Utilities_Math_File::convertFileSize(filesize($fileAndPath));
		$itemArray['url'] = Utilities_File::getAbsoluteUrlFromFullPath($fileAndPath);
		$itemArray['name'] = $file;
		$itemArray['id'] = str_replace($sanitize, '_', Utilities_File::getAbsoluteUrlFromFullPath($fileAndPath));
		if($itemArray['type'] == 'dir'){
			$itemArray['fileType'] = 'dir';
		}
		else {
			$itemArray['fileType'] = Utilities_File::parseFileType($file);
		}
		if($itemArray['fileType'] == 'img'){
			$imgData = getimagesize($fileAndPath);
			$itemArray['width'] = $imgData[0] . 'px';
			$itemArray['height'] = $imgData[1] . 'px';			
			$type = explode('/', $imgData['mime']);
			$itemArray['imageType'] = $type[1];
		}
		return $itemArray;
	}
	
	function parseFileType($filename){
		$fileArray = explode('.', $filename);
		$type = '';
		switch(end($fileArray)){
			case 'jpg':
			case 'jpeg':
			case 'gif':
			case 'png':
				$type = 'img';
				break;
			case 'php':
			case 'js':
				$type = 'script';
				break;
			case 'htm':
			case 'html':
				$type = 'html';
				break;
			case 'swf':
			case 'flv':
				$type = 'swf';
				break;
			default:
				$type = 'file';
				break;
		}
		return $type;
	}
	
	function getAbsoluteUrlFromFullPath($fullPath){
		$rootLen = strlen(SERVER_ROOT) - 1;
		return substr($fullPath, $rootLen);
	}
	
	function buildBootStrapUrlAndFile($url){
		$this->makeDirectory($url);
		$this->writeBootStrap($url);
	}
	
	function writeBootStrap($url){
		$urlArray = explode('/', $url);
		$this->urlCount = count($urlArray) - 2;
		$phpDirString = '';
		//echo $this->urlCount;
		for($i = 0; $i < $this->urlCount; $i++){
			$phpDirString .= '../';
		}
		$phpDirString .= 'php/system.php';
		$fileToWrite = fopen(SERVER_ROOT . $url . 'index.php', 'x+');
		$content = "<?php
		require('" . $phpDirString . "');";
		fwrite($fileToWrite, $content);
		fclose($fileToWrite);		
	}
	
	function makeDirectory($filePath){
		mkdir(SERVER_ROOT . $filePath, 0777, true);
	}
	
	

}