<?php
	//	Desert Rat AUTOS VIEW 2 PAGE 

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

	// Storing POST variables in the session variable array
	$_SESSION['title'] = $_POST['title'];
	$_SESSION['make'] = $_POST['make'];
	$_SESSION['model'] = $_POST['model'];
	$_SESSION['year'] = $_POST['year'];
	$_SESSION['doors'] = $_POST['doors'];
	$_SESSION['engine'] = $_POST['engine'];
	$_SESSION['trans'] = $_POST['trans'];
	$_SESSION['description'] = $_POST['description'];
	$_SESSION['contact'] = $_POST['contact'];
	
	// These were hidden POST variables in the form
	$_SESSION['userNum'] = $_POST['userNum'];
	$_SESSION['extension'] = $_POST['extension'];
	$_SESSION['catagory'] = $_POST['catagory'];
	$_SESSION['cat'] = $_POST['cat'];
	$_SESSION['start'] = $_POST['start'];
	$_SESSION['end'] = $_POST['end'];
	$_SESSION['autoInc'] = $_POST['autoInc'];
	
	//  ALLOW THE USER TO VIEW THE EDITED CLASSIFIED AD
	
	// display the page name in the tab
	display_header('Autos & SUVs View');
	
	// display the banner and sidebars
	site_banner();
	display_Lside();
	display_Rside();
	
	// Show the user what the contents of the ad uploaded
	autos_view();

	// display the footer
	display_footer();
	
	
   }
  }
 }
}											 
?>