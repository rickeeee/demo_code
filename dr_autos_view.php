<?php
	//	Desert Rat AUTOS VIEW PAGE 

	// Start a session
	session_start();
	
	// include function files for this application
	require_once('dr_libraries.php');

	// Check that the user has logged in. 
	  if (!isset($_SESSION['valid_user']))	{
		  
	// Display the header, banner and sidebars
	display_header('Problem');
	site_banner();
	display_Lside();
	display_Rside();
	
	// Dispaly the error message
	log_in_fail();
	exit;
	
	} else {
	
	// open a database connection
	$db_con = dr_con_db();
	  
	 // grab the client ID from the users tables
	 $result = mysqli_query($db_con, "select userNum from users where userName = 	                                    '".$_SESSION['valid_user']."'");
}
	 
	 	// Test the result of this query
		if (!$result) {
		
		// Display the header, banner and sidebars
		display_header('Problem');
		site_banner();
		display_Lside();
		display_Rside();
	
		// Dispaly the error message
		select_fail();
		exit;
		
	} else {
		
		// Get the user number from the row
		$row= mysqli_fetch_row($result);
		$userNum = $row[0];
		$_SESSION['userNum'] = $userNum;
		
		mysqli_free_result($result);

}

	// Close the database connection
	mysqli_close($db_con);

	// 	Check to see if form is filled out FROM dr_validation.php
	$form_filled = not_compFrm($_POST);
		if ($form_filled == false)	{	
		display_header('Problem');
				site_banner();
				display_Lside();
				display_Rside();
			echo "<div id='formLayout'> 
      			<br />
      			<p>
				You did not fill out the form.<br />
				<a href='dr_autos_form.php'>BACK</a>
      			</p>
      			</div>";
				// display the footer
				display_footer();
				exit;
			
		} else {

	//	Clean up any $_SESSION data	From fns_data_valid.php
	sessionFltr($_SESSION);	

	//	Clean up any $_COOKIE data	From fns_data_valid.php
	cookieFltr($_COOKIE);

	//	Clean up any $_GET data	From fns_data_valid.php
	$getFltrInput = getFltr($_GET);
		if ($getFltrInput == true)	{
			display_header('Problem');
			site_banner();
			display_Lside();
			display_Rside();
			echo "<div id='formLayout'> 
      			<br />
      			<p>
				You did not fill out the form.<br />The FBI is looking for you!<br />
				<a href='dr_autos_form.php'>BACK</a>
      			</p>	
      			</div>";
			// display the footer
			display_footer();
			exit;
		} else	{

	// Run the clean up function for the $_POST array FROM dr_validation.php
	$postFltrInput = postFltr($_POST);
		if ($postFltrInput == false)	{
			echo "You did not fill out the form.<br />You can't use the site without using the interface.";
			exit;
		} else	{
	
	// Call the photo extention function to insert the correct values in the DB FROM dr_validation.php
	$photosUploaded = img_suffix();
		if (photosUploaded == FALSE)	{
				display_header('Problem');
				site_banner();
				display_Lside();
				display_Rside();
			echo "<div id='formLayout'> 
      			<br />
      			<p>
				You did not upload any photos!.<br />
				<a href='dr_autos_form.php'>BACK</a>
      			</p>
      			</div>";
				// display the footer
				display_footer();
						
	} else {	
	
	//	Create short variable names for catagory & make them session variables
	$catagory = 03;
	$_SESSION['catagory'] = $catagory;
	$_SESSION['cat'] = "Automobiles";
	
	// Get the current date and add one month, & make it a session variable FROM dr_other_functions.php
	$date = date_insrt();
	$start = date_start();
	$end = "";
	$_SESSION['start'] = $start;
	$_SESSION['end'] = $end;
	
	// storing POST variables in the session variable array
	$_SESSION['title'] = $_POST['title'];
	$_SESSION['make'] = $_POST['make'];
	$_SESSION['model'] = $_POST['model'];
	$_SESSION['year'] = $_POST['year'];
	$_SESSION['doors'] = $_POST['doors'];
	$_SESSION['engine'] = $_POST['engine'];
	$_SESSION['trans'] = $_POST['trans'];
	$_SESSION['description'] = $_POST['description'];
	$_SESSION['contact'] = $_POST['contact'];
	
	// Create an instance_id and make it a session varibale
	$autoInc = $_SESSION['valid_user'].$date;
	$_SESSION['autoInc'] = $autoInc;
		 
	//  PROCESS THE PHOTOS FOR AND MOVE THEM TO THE FOLDER
		 
	// Check for user_file errors FROM dr_validation.php
	file_prob();
  
  	// Check for black listed extensions FROM dr_validation.php
	bad_file();
  
   	// Check for propper mime type FROM dr_validation.php
   	img_type();
	
	// Convert any PNG to JPG
	pngConvert();

	// Move the images to the temp folder FROM dr_validation.php
  	move_to();
	
	// Resize the uploaded images FROM dr_validation.php
	img_resize();
	
	// Create a thumbnail of First Image FROM dr_validation.php
	img_thumb();
  
  	// Change the name of each photo FROM dr_validation.php
  	img_rename();
	
	//  move the images from temp to uploads folder
  	move_to2();
	
	// display the page name in the tab
	display_header('Autos & SUVs View');
	
	// display the banner and sidebars
	site_banner();
	display_Lside();
	display_Rside();
	
	// tell user what the title of the ad is and contents
	autos_view();

	// display the footer
	display_footer();
	
   }	
  }
 }
}												 
?>