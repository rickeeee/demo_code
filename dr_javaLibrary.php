<script type="text/javascript" src="js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js" ></script>
<script type="text/javascript" src="js/jquery.validate.min.js" ></script>
<script type="text/javascript" src="js/lib/jquery.metadata.js" ></script>

<script type="text/javascript" src="js/ui/jquery.ui.core.js" ></script>
<script type="text/javascript" src="js/ui/jquery.ui.widget.js" ></script>
<script type="text/javascript" src="js/ui/jquery.ui.datepicker.js" ></script>
<script type="text/javascript" src="js/jquery.watermark.js" ></script>

<script>
	
	
<?php	// This will allow tabs in the srch_advanced.php page ?>
	$(document).ready(function() {
	$("#tabs").tabs();
});

<?php	// This will validation the form "form1" ?>
	$(document).ready(function() {
	$("#form1").validate();
	$("#selecttest").validate();
});

<?php	// This will validate all my input forms ?>

	$(document).ready(function() {
	$("#form").validate();
  }
);
	
<?php	// This will validate all my "head1" form ?>
	
	$(document).ready(function() {
	$("#head1").validate();
  }
);

<?php	// This will place the cursor in the first available field in any form ?>

	$(document).ready(function() {
	$("input:text:visible:first").focus();
  }
);
	
<?php // This will provide a "From" & "To" Date Picker widget in my forms ?>
	
		$(function() {
		$( "#from" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
			onSelect: function( selectedDate ) {
				$( "#to" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
			onSelect: function( selectedDate ) {
				$( "#from" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
	});
		
<?php	// This will show my hidden "head1" form ?>
	
	function ShowHide() {
	var head1 = document.getElementById("head1");
	var showform = document.form1.head1.checked;
	head1.style.visibility=(showform) ? "visible" : "hidden";
}

</script>