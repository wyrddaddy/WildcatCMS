<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="robots" content="noindex,nofollow"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	 
$idir = "../images/portfolio/";   // Path To Images Directory
$tdir = "../images/portfolio/thumbs";   // Path To Thumbnails Directory
//$hdir =  "../../images/horse/";   // Path To Horse Picture Directory
$twidth = "180";   // Maximum Width For Thumbnail Images
$theight = "120";   // Maximum Height For Thumbnail Images

if (!isset($_GET['subpage'])) {   // Image Upload Form Below 

$todaysDate = date('Y-m-d');
mysql_connect("nowherex.db.5514106.hostedresource.com", "nowherex", "enD#4RuiW") or die(mysql_error());
mysql_select_db("nowherex") or die(mysql_error());


		


  ?> Upload file
<br />
<br />

  <form method="post" action="upload.php?subpage=upload" enctype="multipart/form-data">
    <p>
      <input type="radio" name="table" value="portfolio_web" />
      Web<br />
<input type="radio" name="table" value="portfolio_print" />Print<br />
<input type="radio" name="table" value="portfolio_photo" />Photography</p>
    <p><br /><input type="text" name="iname" />Name of Image<br />
<input type="text" name="idesc" />Description of Image<br />
<input type="radio" name="ori" value="landscape" />Landscape
<input type="radio" name="ori" value="portrait" />Portrait<br />
<br />
<br />

      
      <input type="file" name="imagefile" class="form">
    </p>
      
      <br />
      <input name="submit" type="submit" value="Sumbit" class="form">  
      <input type="reset" value="Clear" class="form">
    </p>
      </div>
        </p>
</form>


<?php } 






if (isset($_GET['subpage']) && $_GET['subpage'] == 'upload') {   // Uploading/Resizing Script
   mysql_connect("nowherex.db.5514106.hostedresource.com", "nowherex", "enD#4RuiW") or die(mysql_error());
	mysql_select_db("nowherex") or die(mysql_error());
	$target = "../portfolio/";
	$target = $target . basename($_FILES['imagefile']['name']);
	
	$imageurl = "portfolio/";
	$imageurl = $imageurl . basename($_FILES['imagefile']['name']);
	

	
		if(move_uploaded_file($_FILES['imagefile']['tmp_name'], $target))
		{
			mysql_query('INSERT INTO '.$_POST['table'].' (link, name, description, orientation)  VALUES ("'.$imageurl.'","'.$_POST['iname'].'","'.$_POST['idesc'].'","'.$_POST['ori'].'")') or die(mysql_error());
			$msg = "The file ". basename( $_FILES['imagefile']['name']). " has been uploaded";
		
		
		}
		else {
		$msg = "Sorry, there was a problem uploading your file.";
		}  
	 print ''.$msg.'';
} 

?>
</body>
</html>