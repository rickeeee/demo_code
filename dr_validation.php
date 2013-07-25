<?php

function not_compFrm($_POST) {	// call this for forms users fill out 
	
	// count the number of elements & subtract two (2 non-form fields are in the count)
	$count = count($_POST);
	$total = $count - 2;
	
	// test for elements that have an empty set ($value==' ')
  	$num = 0; 
  	while ($num < count($_POST)) {
	  foreach ($_POST as $key => $value) {
     if ($value == '' ) {
	 $num++;
    }
  }
	// If percent is more than 50, the user did not fill out the form correctly
	$percnt = $num / $total;
	if ($percnt >= 0.50) {
		return false;
		exit;
	
	} 
	// Otherwise, if percent is less than 50, the user fill most of the form out
	return true;
	exit;
  }
}

// Create a function to clean up $_POST data
function postFltr($_POST)	{
			if ($_POST)		{
	foreach ($_POST as $key => $value) { 	
    $_POST[$key] = escapeshellcmd($value); 
	}
	
	foreach ($_POST as $key => $value) { 
    $_POST[$key] = strip_tags($value);
	}
	
	foreach ($_POST as $key => $value) { 
   	$_POST[$key] = preg_replace('/[\x00-\x0C\x0E-\x1F\x2A\x5B-\x5E\x60\x7B-\x7F]/', '',$value); 
	}
	
	foreach ($_POST as $key => $value) { 
    	$_POST[$key] = addcslashes($value,  '"');
	}
	
	foreach ($_POST as $key => $value) { 
    	$_POST[$key] = addcslashes($value,  "'%_;");
	}
	
	foreach ($_POST as $key => $value) { 	
    $_POST[$key] = trim($value); 
	}
		return true;
		
	} else	{
		
		return false;
  }
}

// Create a function to clean up $_SESSION array
function sessionFltr($_SESSION)	{
		if ($_SESSION)	{
	foreach ($_SESSION as $key => $value) { 	
    $_SESSION[$key] = escapeshellcmd($value); 
	}
	
	foreach ($_SESSION as $key => $value) { 
    $_SESSION[$key] = strip_tags($value);
	}
	
	foreach ($_SESSION as $key => $value) { 
   	$_SESSION[$key] = preg_replace('/[\x00-\x0C\x0E-\x1F\x2A\x5B-\x5E\x60\x7B-\x7F]/', '',$value); 
	}
	
	foreach ($_SESSION as $key => $value) { 
    	$_SESSION[$key] = addcslashes($value,  '"');
	}
	
	foreach ($_SESSION as $key => $value) { 
    	$_SESSION[$key] = addcslashes($value,  "'%_;");
	}
	
	foreach ($_SESSION as $key => $value) { 	
    $_SESSION[$key] = trim($value); 
	}
		return true;
	
  	} else	{
		
		// Continue through the loop
  }
}

// Create a function to clean up $_COOKIE array
function cookieFltr($_COOKIE)	{
		if ($_COOKIE)	{
	foreach ($_COOKIE as $key => $value) { 	
    $_COOKIE[$key] = escapeshellcmd($value); 
	}
	
	foreach ($_COOKIE as $key => $value) { 
    $_COOKIE[$key] = strip_tags($value);
	}
	
	foreach ($_COOKIE as $key => $value) { 
   	$_COOKIE[$key] = preg_replace('/[\x00-\x0C\x0E-\x1F\x2A\x5B-\x5E\x60\x7B-\x7F]/', '',$value); 
	}
	
	foreach ($_COOKIE as $key => $value) { 
    	$_COOKIE[$key] = addcslashes($value,  '"');
	}
	
	foreach ($_COOKIE as $key => $value) { 
    	$_COOKIE[$key] = addcslashes($value,  "'%_;");
	}
	
	foreach ($_COOKIE as $key => $value) { 	
    $_COOKIE[$key] = trim($value); 
	}	
		return true;
		
	} else	{
		
		// Continue through the loop
  }
}

// Create a function to clean up $_GET array
function getFltr($_GET)	{
		if ($_GET)	{
	foreach ($_GET as $key => $value) { 	
    $_GET[$key] = escapeshellcmd($value); 
	}
	
	foreach ($_GET as $key => $value) { 
    $_GET[$key] = strip_tags($value);
	}
	
	foreach ($_GET as $key => $value) { 
   	$_GET[$key] = preg_replace('/[\x00-\x0C\x0E-\x1F\x2A\x5B-\x5E\x60\x7B-\x7F]/', '',$value); 
	}
	
	foreach ($_GET as $key => $value) { 
    	$_GET[$key] = addcslashes($value,  '"');
	}
	
	foreach ($_GET as $key => $value) { 
    	$_GET[$key] = addcslashes($value,  "'%_;");
	}
	
	foreach ($_GET as $key => $value) { 	
    $_GET[$key] = trim($value); 
	}	
		//return true;
		
	} else	{
		
		// Continue through the loop
  }
}

function file_prob() 	{
	
	//Check to see if an error code was generated on the upload attempt
	$num = 0;
	while ($num < 5) 	{
    if (in_array($_FILES['userfile']['error'][$num], array(1, 2, 3, 5, 6, 7)))   {  
	  
    display_header('Problem');
	site_banner();
	display_Lside();
	display_Rside();
	
	// Dispaly the error message
    switch ($_FILES['userfile']['error'][$num])   {
		
      case 1:	echo "<div id='formLayout'> 
      			<br />
      			<p>
      			The file, ";
				echo $_FILES['userfile']['name'][$num].", exceeded upload_max_filesize.
      			</p>
      			</div>";
				// display the footer
				display_footer;
				exit;
      case 2:	echo "<div id='formLayout'> 
      			<br />
      			<p>
      			The file, "; 
				echo $_FILES['userfile']['name'][$num].", exceeded max_file_size.
      			</p>
      			</div>";
				// display the footer
				display_footer;
				exit;
      case 3:	echo "<div id='formLayout'> 
      			<br />
      			<p>
      			The file, "; 
				echo $_FILES['userfile']['name'][$num].", only partially uploaded.
      			</p>
      			</div>";
				// display the footer
				display_footer;
				exit;
	  case 6:   echo "<div id='formLayout'>  
      			<br />
      			<p>
      			Cannot upload file: "; 
				echo $_FILES['userfile']['name'][$num].". No temp directory specified.
      			</p>
      			</div>";
				// display the footer
				display_footer;
				exit;
	  case 7:   echo "<div id='formLayout'>  
      			<br />
      			<p>
      			Upload failed for: ";
				echo $_FILES['userfile']['name'][$num].". Cannot write to disk.
      			</p>
      			</div>";
				// display the footer
				display_footer;
				exit;
    }
    	// Keep iterating the loop - it will exit when $num >= 5
  }	
  	$num++;
  }	
}

function bad_file()	{	
	
	// Check for PHP extension and exclude any such file from uploading
  $blacklist = array(".php", ".phtml", ".php3", ".php4", ".php5");

	$num = 0;
	while ($num < 5) 	{
		foreach ($blacklist as $item) {
			if(preg_match("/$item\$/i", $_FILES['userfile']['name'][$num])) {	
			
			// Display header and sidebars
			display_header('Problem');
			site_banner();
			display_Lside();
			display_Rside();
			echo "<div id='formLayout'> 
      			 <br />
      			 <p>
      			 The file, ";
			echo $_FILES['userfile']['name'][$num].", is not a photo.<br />
				 We don't allow the uploading of PHP files.
      			</p>
      			</div>";
				// display the footer
				display_footer;
			exit;	// exit processing - user must input propper type - use jQuery form validation too
 		}
	  }
		$num++;
	} 	
}

function img_type()	{
	
	// Does the file have the right MIME type?
	$num = 0;
	while ($num < 5) 	{
	if ($_FILES['userfile']['name'][$num])	{
   	$imageinfo = getimagesize($_FILES['userfile']['tmp_name'][$num]);	
		 if ($imageinfo ['mime'] != 'image/jpeg' && $imageinfo ['mime'] != 'image/jpg'
			&& $imageinfo ['mime'] != 'image/JPG' && $imageinfo ['mime'] != 'image/gif'
			&& $imageinfo ['mime'] != 'image/png')  {	
		 
    		// Display header and sidebars
			display_header('Problem');
			site_banner();
			display_Lside();
			display_Rside();
			echo "<div id='formLayout'> 
      			 <br />
      			 <p>
      			 The file, ";
			echo $_FILES['userfile']['name'][$num].", is not a photo.<br />
      			</p>
      			</div>";
				// display the footer
				display_footer;
    		exit;
		 }
 	 }
	$num++;
  }
}

function pngConvert()	{
	$num = 0;
	while ($num < 5) 	{
		//	Check to see if the image is a PNG
	if ($_FILES['userfile']['type'][$num] == 'image/png') {
		// Make sure the file has been uploaded for security reasons
		 if (is_uploaded_file($_FILES['userfile']['tmp_name'][$num])) {	
		// Provide image location cause the function doesn't know how to nav thru array
		$imageloc = $_FILES['userfile']['tmp_name'][$num];
		//	Convert any PNG to JPEG file format
		$imagePNG = imagecreatefrompng($imageloc);
		//	Create JPEG from PNG
			imagejpeg($imagePNG, 'temp.jpg', 75);
			imagedestroy($imagePNG);
			// Start process to rename & move file
			$name = explode('.', $_FILES['userfile']['name'][$num]);
			$newFile = $name[0].'.jpeg';
			$newName = $name[0].'.tmp';
			@ rename('temp.jpg', './temp/'.$newFile);
			@ $imageSize = filesize('./temp/'.$newName);
			$_FILES['userfile']['name'][$num] = $newFile;
			$_FILES['userfile']['type'][$num] = 'image/jpg';
			$_FILES['userfile']['tmp_name'][$num] = 'C:\\xampp\\tmp\\'.$newName;
			$_FILES['userfile']['size'][$num] = $imageSize;
		 }
	   }
	   $num++;
 	 }
  }

function img_suffix()	{
	
	// Find out what the photo extensions will be
	if ($_FILES['userfile']['name'][0])	{
	$extension = A;
 }
  	if ($_FILES['userfile']['name'][1])	{
	$extension .= B;
 }
	if ($_FILES['userfile']['name'][2])	{
  	$extension .= C;
 }
  	if ($_FILES['userfile']['name'][3])	{
	$extension .= D;
 }
  	if ($_FILES['userfile']['name'][4])	{	
	$extension .= E;
 }
 	// Will return the photos uploaded to paid_bicycle_view
	$_SESSION['extension'] = $extension;
}

function move_to()	{
	
	// put the file in the uploads folder
	$num = 0;
	while ($num < 5) 	{
	if ($_FILES['userfile']['name'][$num])	{
	$upfile = './temp/'.$_FILES['userfile']['name'][$num];

 	 if (is_uploaded_file($_FILES['userfile']['tmp_name'][$num])) {	
  
    	     if (!move_uploaded_file($_FILES['userfile']['tmp_name'][$num], $upfile))  {	
     
       	     // Display header and sidebars
			display_header('Problem');
			site_banner();
			display_Lside();
			display_Rside();
			 echo "<div id='formLayout'> 
      			<br />
      			<p>
      			Problem: Could not move file(s) to destination directory.
      			</p>
      			</div>";
				// display the footer
				display_footer;
        	    exit;
  }	
	 
 	 } else {	

		//	 continue processing the data
  		}	
	}
	$num++;
  }
}

function img_resize() {

	//list the width and height and maintain the photo ratio.
	$num = 0;
	while ($num < 5) 	{
	if ($_FILES['userfile']['name'][$num])	{
	@ list($width, $height) = getimagesize('./temp/'.$_FILES['userfile']['name'][$num]); 
	
	//calculate the image ratio
	@ $imgratio=$width/$height;
	
	// determine the orientation of the photo
	if ($width > $height) 	{	//	LANDSCAPE ORIENTATION
	
		if ($width > 600)	{
			
			$newWidth = 600;
			$newHight = $newWidth/$imgratio;
			
			//function for resize image.
			$resized_img = imagecreatetruecolor($newWidth,$newHight);
			
			// Identify the source photo
			$source = imagecreatefromjpeg('./temp/'.$_FILES['userfile']['name'][$num]);
			
			// The resizing is going on here!	
			imagecopyresized($resized_img, $source, 0, 0, 0, 0, $newWidth, $newHight, $width, $height);
			
			// need to save and rename the image
			 ImageJpeg ($resized_img,'./temp/'.$_FILES['userfile']['name'][$num]);
			
			// distroy the temp image file
			ImageDestroy ($resized_img);
}
		
	} elseif ($height > $width) {	//	PORTRATE ORIENTATION 
		
		if ($height > 600)	{
			
			$newHight = 600;
			$newWidth = $newHight*$imgratio;
			
			//function for resize image.
			$resized_img = imagecreatetruecolor($newWidth,$newHight);
			
			// Identify the source photo
			$source = imagecreatefromjpeg('./temp/'.$_FILES['userfile']['name'][$num]);
			
			//the resizing is going on here!	
			imagecopyresized($resized_img, $source, 0, 0, 0, 0, $newWidth, $newHight, $width, $height);
			
			// need to save and rename the image
			ImageJpeg ($resized_img,'./temp/'.$_FILES['userfile']['name'][$num]);
			
			// distroy the temp image file
			ImageDestroy ($resized_img);
			
		}
	  }
	  //	Just continue through the files
	}
	$num++;
	}
}

function img_thumb() {

	//list the width and height and maintain the photo ratio.
	list($width, $height) = getimagesize('./temp/'.$_FILES['userfile']['name'][0]); 
	
	//calculate the image ratio
	$imgratio=$width/$height;
	
	// determine the orientation of the photo
	if ($width > $height) 	{	//	LANDSCAPE ORIENTATION
	
		if ($width > 100)	{
			
			$newWidth = 100;
			$newHight = $newWidth/$imgratio;
			
			//function for resize image.
			$resized_img = imagecreatetruecolor($newWidth,$newHight);
			
			// Identify the source photo
			$source = imagecreatefromjpeg('./temp/'.$_FILES['userfile']['name'][0]);
			
			//the resizing is going on here!	
			imagecopyresized($resized_img, $source, 0, 0, 0, 0, $newWidth, $newHight, $width, $height);
			
			// need to save and rename the image
			 ImageJpeg ($resized_img,'./temp/'.$_SESSION['autoInc'].'T.jpg');
			
			// distroy the temp image file
			ImageDestroy ($resized_img);
			
		} else	{
			
			// Change the name of each photo
  			rename ('./temp/'.$_FILES['userfile']['name'][0], './temp/'.$_SESSION['autoInc'].'T.jpg');
}
		
	} elseif ($height > $width) {	//	PORTRATE ORIENTATION 
		
		if ($height > 100)	{
			
			$newHight = 100;
			$newWidth = $newHight*$imgratio;
			
			//function for resize image.
			$resized_img = imagecreatetruecolor($newWidth,$newHight);
			
			// Identify the source photo
			$source = imagecreatefromjpeg('./temp/'.$_FILES['userfile']['name'][0]);
			
			//the resizing is going on here!	
			imagecopyresized($resized_img, $source, 0, 0, 0, 0, $newWidth, $newHight, $width, $height);
			
			// need to save and rename the image
			ImageJpeg ($resized_img,'./temp/'.$_SESSION['autoInc'].'T.jpg');
			
			// distroy the temp image file
			ImageDestroy ($resized_img);
			
		} else	{

			
			// Change the name of each photo
  			rename ('./temp/'.$_FILES['userfile']['name'][0], './temp/'.$_SESSION['autoInc'].'T.jpg');
			
		}
	}
}

function img_rename()	{	
	
	// Change the name of each photo
	if ($_FILES['userfile']['name'][0])	{
	@ rename ('./temp/'.$_FILES['userfile']['name'][0], './temp/'.$_SESSION['autoInc'].'a.jpg');
 }
  	if ($_FILES['userfile']['name'][1])	{
	@ rename ('./temp/'.$_FILES['userfile']['name'][1], './temp/'.$_SESSION['autoInc'].'b.jpg');
 }
	if ($_FILES['userfile']['name'][2])	{
  	@ rename ('./temp/'.$_FILES['userfile']['name'][2], './temp/'.$_SESSION['autoInc'].'c.jpg');
 }
  	if ($_FILES['userfile']['name'][3])	{
	@ rename ('./temp/'.$_FILES['userfile']['name'][3], './temp/'.$_SESSION['autoInc'].'d.jpg');
 }
  	if ($_FILES['userfile']['name'][4])	{
	@ rename ('./temp/'.$_FILES['userfile']['name'][4], './temp/'.$_SESSION['autoInc'].'e.jpg');
 }
}

function move_to2()	{
	
	// Change the location of each photo - must be in the uploads folder
	if ('./temp/'.$_SESSION['autoInc'].'a.jpg')	{
	@ rename ('./temp/'.$_SESSION['autoInc'].'a.jpg', './uploads/'.$_SESSION['autoInc'].'a.jpg');
	} else	{
		return FALSE;
 }
  	if ('./temp/'.$_SESSION['autoInc'].'b.jpg')	{
	@ rename ('./temp/'.$_SESSION['autoInc'].'b.jpg', './uploads/'.$_SESSION['autoInc'].'b.jpg');
	} else	{
		return FALSE;
 }
	if ('./temp/'.$_SESSION['autoInc'].'c.jpg')	{
  	@ rename ('./temp/'.$_SESSION['autoInc'].'c.jpg', './uploads/'.$_SESSION['autoInc'].'c.jpg');
	} else	{
		return FALSE;
 }
  	if ('./temp/'.$_SESSION['autoInc'].'d.jpg')	{
	@ rename ('./temp/'.$_SESSION['autoInc'].'d.jpg', './uploads/'.$_SESSION['autoInc'].'d.jpg');
	} else	{
		return FALSE;
 }
  	if ('./temp/'.$_SESSION['autoInc'].'e.jpg')	{
	@ rename ('./temp/'.$_SESSION['autoInc'].'e.jpg', './uploads/'.$_SESSION['autoInc'].'e.jpg');
	} else	{
		return FALSE;
 }
 	if ('./temp/'.$_SESSION['autoInc'].'T.jpg')	{
	@ rename ('./temp/'.$_SESSION['autoInc'].'T.jpg', './uploads/'.$_SESSION['autoInc'].'T.jpg');
	} else	{
		return FALSE;
 }
}

?>