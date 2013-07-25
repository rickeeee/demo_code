<?php
//	PAID AUTOs FORM PAGE

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

	// display the page name in the tab
	display_header('Car & SUV Form Page');
	
	// display the banner
	site_banner();
	
	// display the left & right sidebars
	display_Lside();
	display_Rside();
	
	//displey the form 
	autos_form();
	
}

	// display the footer
	display_footer();

?>