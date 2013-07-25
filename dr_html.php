<?php
	// include function files for this application 
	require_once('dr_libraries.php');

function display_header($title) {
  // display the HTML header
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 TransitionFal//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title;?></title>
<?php // USEING VERSION IN THE CSS FILE LINK - CHANGE VERSION # IN LINK WHEN UPDATING CSS ?>
    <link href="rat_global.css?v=1.0" rel="stylesheet" type="text/css" />
    <!--[if IE 5]>
    <style type="text/css"> 
    /* place css box model fixes for IE 5* in this conditional comment */
    .thrColFixHdr #sidebar1 { width: 180px; }
    .thrColFixHdr #sidebar2 { width: 190px; }
    </style>
    <![endif]--><!--[if IE]>
    <style type="text/css"> 
    /* place css fixes for all versions of IE in this conditional comment */
    .thrColFixHdr #sidebar2, .thrColFixHdr #sidebar1 { padding-top: 30px; }
    .thrColFixHdr #mainContent { zoom: 1; }
    /* the above proprietary zoom property gives IE the hasLayout it needs to avoid several 	    bugs   */
    </style>
    <![endif]-->
    <?php require_once('dr_javaLibrary.php'); ?>
    
    </head>

<?php
}

function site_banner() {

?>
<div id="banner">
      
<a href="rt_videos.php"><img src="images/Videos.gif" alt="see our videos" class="see_videos"></a><img src="images/desertrat_logo_680.jpg" alt="desert rat logo" class="dr_logo" /><span class="ticket">Explore all your deserts!</span><div class="search"><form action=""><a href="srch_advanced.php">Advanced Search</a></form></div>
<span class="navbar"><a href="index.php"> Home  </a> | <a href="rt_members.php" > Ad Content  | <a href="login.php"> Log In  </a> |<a href="rt_aboutUs.php"> About Us  </a> |<a href="rt_terms.php"> Terms &amp; Conditions  </a> |<a href="rt_privacy.php"> Privacy Statement  </a>|<a href="rt_contactus_form.php"> Contact Us  </a>|<a href="rt_FAQ.php"> FAQs </a>|<a href="rt_siteMap.php"> Site Map  </a>|<a href="logout.php"> Logout</a></span>
</div>
  <?php
}
				
    function display_Lside() {	// display banner ad left sidebar Blank now - Ads later
?>

      <p><img src="images/blank.gif" width="100" height="140" /></p>
      <p><img src="images/blank.gif" width="100" height="140" /></p>
      <p><img src="images/blank.gif" width="100" height="140" /></p>
        
<?php
}

    function display_Rside() {	// display right sidebar (Blank now - Ads later
?>
      <p><img src="images/blank.gif" width="100" height="140" /></p>
      <p><img src="images/blank.gif" width="100" height="140" /></p>
      <p><img src="images/blank.gif" width="100" height="140" /></p>
      
<?php
}

function log_in_fail() {
	// user did not log in
?> 

    <div class="formLayout">  
     <h4>Problem</h4>
      &nbsp;
      <p>
  	  You are not logged in.<br />
      Only logged in members may see this page.
      </p>
      <p>
      <a href="login.php">Login</a>	
      </p>
      </div>
<?php
	
}

function good_insert() {
	// insertion of data and photos accomplished
?>
     <div class="formLayout"> 
     <h4>Successes</h4>
      &nbsp;
      <p>
      Your ad, <strong><?php echo stripslashes($_POST['title']); ?></strong>, has been placed.
      </p>
      <p>
      <?php u_validation(); ?>
      </p>
      </div>
            
<?php	
}

function select_fail() {
	// the select query failed for some reason
?>
     <div class="formLayout"> 
     <h4> Problem </h4>
      &nbsp;
      <p>
      Could not run the select query at this time,<br />
      please try again later.
      </p>
      </div>
      
<?php
}

function autos_form() {  		// displays the Autos and SUVs form # P03
?>
<div class="formLayout">
<h4>AUTOMOBILE INSERT FORM</h4>
<form action="dr_autos_view.php" method="post" enctype="multipart/form-data"  name="paid_autos" id="form">
<label>Content Title</label>
<input name="title" type="text"  size="50" maxlength="25" class="required" /><br />
<label>Make</label>
<input name="make"  type="text"  size="50" maxlength="24" /><br />
<label>Model</label>
<input name="model"  type="text"  size="50" maxlength="24" /><br />
<label>Year</label>
<input name="year" type="text"  size="4" maxlength="4" /><br />
<label>Doors</label>
<input name="doors"  type="text"  size="50" maxlength="24" /><br />
<label>Engine</label>
<input name="engine" type="text" size="50" maxlength="80" /><br />
<label>Transmission</label>
<select name="trans" id="trans">
         <option>3 Spd Manual</option>
         <option>4 Spd Manual</option>
         <option>5 Spd Manual</option>
         <option>3 Spd Automatic</option>
         <option>4 Spd Automatic</option>
         <option>5 Spd Automatic</option>
         <option>Continuously Variable</option>
         <option>Other</option>
       </select><br /><br />
<label>Auto <br> Description</label>
<textarea name="description" cols="45" rows="5"  id="description" class="required" ></textarea><br />
<label>Contact Via</label>
<select name="contact" id="contact">
         <option>Email</option>
         <option>USmail</option>
         <option>Phone</option>
         <option>Do Not Contact</option>
       </select><br /><br />
<label></label><input type="hidden" name="MAX_FILE_SIZE" value="500000000" /><br />
<label for="userfile">Upload photo 1</label>
<input type="file" name="userfile[]" id="userfile0" accept="jpg|jpeg|png|gif" class="required" /><br />
<label for="userfile">Upload photo 2</label>
<input type="file" name="userfile[]" id="userfile1" accept="jpg|jpeg|png|gif" /><br />
<label for="userfile">Upload photo 3</label>
<input type="file" name="userfile[]" id="userfile2" accept="jpg|jpeg|png|gif" /><br />
<label for="userfile">Upload photo 4</label>
<input type="file" name="userfile[]" id="userfile3" accept="jpg|jpeg|png|gif" /><br />
<label for="userfile">Upload photo 5</label>
<input type="file" name="userfile[]" id="userfile4" accept="jpg|jpeg|png|gif" /><br /><br />	
<label></label><input type="submit" name="userfile" value="Send Content" />
</form>
<br />
<p>
Note: The file "photo 1" will be used to make a thumbnail.<br />
Please make sure to use "photo 1" to upload at least one photo.
</p>
</div>

<?php

}

function autos_view() {  			// displays Autos Listing view form # V03
		
?>
<div class="veiwerLayout">
<h4>Your content, <?php echo stripslashes($_SESSION['title']); ?></h4>
<p>This is your content upload, please take a moment to review the ad for accuracy. If you happened to picked the wrong category, click on the "Category" link. To make changes to the text you have entered, just click on the "Edit Content" button at the bottom of the page and edit the form below as necessary. You may also re-select the pull down menus to change those values.</p>
<div class="viewerTop">
<table width="780" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="300"><img src="<?php echo './uploads/'.$_SESSION['autoInc'].'T.jpg'; ?>" 
    width="100" height="75" border="1" />
      <strong>User Name:</strong> <?php echo $_SESSION['valid_user']; ?><br /></td>
<td width="260"><strong>Title:</strong> <?php echo stripslashes($_SESSION['title']); ?><br /><br />
    				<strong><a href="rt_member.php">Category:</a></strong> <?php echo $_SESSION['cat']; ?><br />
   		  </td>
    <td width="220"><strong>Start date:</strong> <?php echo $_SESSION['start']; ?><br /><br /><br />
      <br /></td>
  </tr>
</table>
</div>
<table width="780" border="0" cellspacing="0" cellpadding="0">
  <tr>
<td width="320"><table width="250" border="0" cellpadding="0" cellspacing="0" class="viewerMidLeft" >
      <tr>
        <td width="80" align="right"><strong>Make:</strong></td>
        <td width="10">&nbsp;</td>
        <td><?php echo stripslashes($_SESSION['make']); ?></td>
      </tr>
      <tr>
        <td width="80" align="right"><strong>Model:</strong></td>
        <td width="10">&nbsp;</td>
        <td><?php echo stripslashes($_SESSION['model']); ?></td>
      </tr>
      <tr>
        <td width="80" align="right"><strong>Year:</strong></td>
        <td width="10">&nbsp;</td>
        <td><?php echo stripslashes($_SESSION['year']); ?></td>
      </tr>
      <tr>
        <td width="80" align="right"><strong>Doors:</strong></td>
        <td width="10">&nbsp;</td>
        <td><?php echo stripslashes($_SESSION['doors']); ?></td>
      </tr>
      <tr>
        <td width="80" align="right"><strong>Engine:</strong></td>
        <td width="10">&nbsp;</td>
        <td><?php echo stripslashes($_SESSION['engine']); ?></td>
      </tr>
      <tr>
        <td width="80" align="right"><strong>Transmission:</strong></td>
        <td width="10">&nbsp;</td>
        <td><?php echo $_SESSION['trans']; ?></td>
      </tr>
      <tr>
        <td width="80" align="right"><strong>Contact:</strong></td>
        <td width="10">&nbsp;</td>
        <td><?php echo $_SESSION['contact']; ?></td>
      </tr>
    </table>
    </div>
<table class="viewerMidRight" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>Description:  </strong><?php echo stripslashes(substr($_SESSION['description'], 0, 1000)); ?></td>
  </tr>
</table>
<table width="780" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>&nbsp;</td>
      <td width="18">&nbsp;</td>
      <td>&nbsp;</td>
      <td width="19">&nbsp;</td>
      <td>&nbsp;</td>
      <td width="18">&nbsp;</td>
      <td>&nbsp;</td>
      <td width="19">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
      <td colspan="5" align="center">Note: Actual size of photos is 600 x 450 pixels</td>
     <tr>
      <td width="132">&nbsp;</td>
      <td width="15">&nbsp;</td>
      <td width="132">&nbsp;</td>
      <td width="15">&nbsp;</td>
      <td width="132">&nbsp;</td>
      <td width="15">&nbsp;</td>
      <td width="132">&nbsp;</td>
      <td width="15">&nbsp;</td>
      <td width="190">&nbsp;</td>
    </tr>
    <tr>
      <td width="132"><img src="<?php echo './uploads/'.$_SESSION['autoInc'].'a.jpg'; ?>" width="132" height="99" /></td>
      <td width="15"></td>
      <td width="132"><img src="<?php echo './uploads/'.$_SESSION['autoInc'].'b.jpg'; ?>" width="132" height="99" /></td>
      <td width="15"></td>
      <td width="132"><img src="<?php echo './uploads/'.$_SESSION['autoInc'].'c.jpg'; ?>" width="132" height="99" /></td>
      <td width="15"></td>
      <td width="132"><img src="<?php echo './uploads/'.$_SESSION['autoInc'].'d.jpg'; ?>" width="132" height="99" /></td>
      <td width="15"></td>
      <td width="190"><img src="<?php echo './uploads/'.$_SESSION['autoInc'].'e.jpg'; ?>" width="132" height="99" /></td>
    </tr>
    <tr>
      <td>Image 1</td>
      <td width="15"></td>
      <td>Image 2</td>
      <td width="15"></td>
      <td>Image 3</td>
      <td width="15"></td>
      <td>Image 4</td>
      <td width="15"></td>
      <td>Image 5</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><form name="form1" >
      <input type="checkbox" name="head1" onclick="ShowHide();" />
      Edit Content</form></td>
      <td>&nbsp;</td>
      <td align="right" valign="top"><form method="post" action="dr_autos_insert.php" name="paid_autos2" id="paid_autos2" style="visibility:hidden;" >
<input type="hidden" name="userNum" value="<?php echo $_SESSION['userNum'];  ?>" />
<input type="hidden" name="extension" value="<?php echo $_SESSION['extension'];  ?>" />
<input type="hidden" name="catagory" value="<?php echo $_SESSION['catagory']; ?>" />
<input type="hidden" name="autoInc" value="<?php echo $_SESSION['autoInc']; ?>" />
<input type="hidden" name="title" value="<?php echo $_SESSION['title']; ?>" />
<input type="hidden" name="make" value="<?php echo $_SESSION['make']; ?>" />
<input type="hidden" name="model" value="<?php echo $_SESSION['model']; ?>" />
<input type="hidden" name="year" value="<?php echo $_SESSION['year']; ?>" />
<input type="hidden" name="doors" value="<?php echo $_SESSION['doors']; ?>" />
<input type="hidden" name="engine" value="<?php echo $_SESSION['engine']; ?>" />
<input type="hidden" name="trans" value="<?php echo $_SESSION['trans']; ?>" />
<input type="hidden" name="description" value="<?php echo $_SESSION['description']; ?>" />
<input type="hidden" name="contact" value="<?php echo $_SESSION['contact']; ?>" />
<label></label><input type="submit" style="visibility:visible;" value="Proceed" />
</form></td>
      <td>&nbsp;</td>
      <td valign="top" ></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="5">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
<div class="formLayout">
<form method="post" action="dr_autos_view2.php" name="paid_autos3" id="head1" style="visibility:hidden;" >
<h4>AUTOS INSERT FORM</h4>
<input type="hidden" name="userNum" value="<?php echo $_SESSION['userNum'];  ?>" />
<input type="hidden" name="extension" value="<?php echo $_SESSION['extension'];  ?>" />
<input type="hidden" name="catagory" value="<?php echo $_SESSION['catagory']; ?>" />
<input type="hidden" name="cat" value="<?php echo $_SESSION['cat']; ?>" />
<input type="hidden" name="start" value="<?php echo $_SESSION['start']; ?><br />" />
<input type="hidden" name="end" value="<?php echo $_SESSION['end']; ?><br />" />
<input type="hidden" name="autoInc" value="<?php echo $_SESSION['autoInc']; ?>" />
<label>Content Title</label>
<input name="title" type="text"  size="50" maxlength="25" value="<?php echo stripslashes($_SESSION['title']); ?>" class="required" /><br />
<label>Make</label>
<input name="make"  type="text"  size="50" maxlength="24" value="<?php echo stripslashes($_SESSION['make']); ?>" /><br />
<label>Model</label>
<input name="model"  type="text"  size="50" maxlength="24"  value="<?php echo stripslashes($_SESSION['model']); ?>" /><br />
<label>Year</label>
<input name="year" type="text" size="4" maxlength="4" value="<?php echo stripslashes($_SESSION['year']); ?>" /> <br />
<label>Doors</label>
<input name="doors" type="text" size="4" maxlength="4" value="<?php echo stripslashes($_SESSION['doors']); ?>" /> <br />
<label>Engine</label>
<input name="engine"  type="text"  size="50" maxlength="24" value="<?php echo stripslashes($_SESSION['engine']); ?>" /><br />
<label>Transmission</label>
<select name="trans" id="trans">
         <option><?php echo $_SESSION['trans']; ?></option>
         <option>3 Spd Manual</option>
         <option>4 Spd Manual</option>
         <option>5 Spd Manual</option>
         <option>3 Spd Automatic</option>
         <option>4 Spd Automatic</option>
         <option>5 Spd Automatic</option>
         <option>Continuously Variable</option>
         <option>Other</option>
         		 </select><br /><br />
<label>Auto <br> Description</label>
<textarea name="description" cols="45" rows="5"  id="description" class="required" ><?php echo stripslashes($_SESSION['description']); ?> </textarea><br />
<label>Contact Via</label>
<select name="contact" id="contact">
		 <option><?php echo $_SESSION['contact']; ?></option>
         <option>Email</option>
         <option>USmail</option>
         <option>Phone</option>
         <option>Do Not Contact</option>
      </select><br /><br />	
<label></label><input type="submit" name="userfile" value="Re-submit" />
</form>
</div>
</div>

<?php

}


function display_footer() {
  // display the HTML footer
  
?>
  <div id="footer">
  <p><a href="index.php"> Home  </a> | <a href="rt_member.php" > Ad Content  | <a href="login.php"> Log In  </a> |<a href="rt_aboutUs.php"> About Us  </a> |<a href="terms.php"> Terms &amp; Conditions  </a> |<a href="rt_privacy.php"> Privacy Statement  </a>|<a href="rt_contactUs.php"> Contact Us  </a>|<a href="rt_FAQ.php"> FAQs </a>|<a href="siteMap.php"> Site Map  </a>|<a href="logout.php"> Logout</a></p>
  <p>Copyright Desert Rat, all rights reserved.</p> 
	</div>
	</body>
	</html>
<?php
}
?>