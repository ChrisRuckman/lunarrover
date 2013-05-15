<?php
	if($_POST) {
		$email = addslashes($_POST["txtEmail"]);
		$desc = (!$_POST["rbDesc"] ? 0 : $_POST["rbDesc"]);
		$gender = $_POST["sex"];
		$compTime = (!$_POST["txtTime"] ? 0 : addslashes($_POST["txtTime"]));
		$fairTest = addslashes($_POST["txtFairTest"]);
		$likeBest = addslashes($_POST["txtLikes"]);
		$likeLeast = addslashes($_POST["txtDislikes"]);
		$challenges = addslashes($_POST["txtChallenge"]);
		$suggestions = addslashes($_POST["txtSuggestions"]);

		$sql = "INSERT INTO `lrfeedback` (`desc`, `gender`, `compTime`, `fairTest`, `likeBest`, `likeLeast`, `challenges`, `suggestions`)
				VALUES ('$desc', '$gender', '$compTime', '$fairTest', '$likeBest', '$likeLeast', '$challenges', '$suggestions')";

		$dbhost = 'db2.cet.edu';
		$dbuser = 'andrew';
		$dbpass = '54mur41';
		$dbname = 'badges';

		$link = mysql_connect($dbhost, $dbuser, $dbpass);
		mysql_select_db($dbname);

		mysql_query($sql) or die(mysql_error());

		mysql_close($link);
		//returnAssertion($email, 'wjucet');
		if($desc != 0 || $desc != "5-12") {
			header("Location: http://badges.cet.edu/badge-it-gadget-lite/process-badges/");
		}
	}
?>
<html>
<head>
	<script type="text/javascript">
		function validate() {
			var msg = "";
			if(document.getElementById('txtEmail').value.length <= 0) {
				msg = 'You must supply an email address.'+"\r\n";
			}
			//if(document.getElementById("rbDesc").checked == false) {
			//	msg += 'You must select an answer to "Which best describes you"';
			//}
			if(msg.length > 0) {
				alert(msg);
			} else {
				document.forms[0].submit();
			}
		}
	</script>
	<style type="text/css">
		* { background-color: #fff; font-family: Ariel; }
		.container { margin: 0 auto; }
		div { margin: 5px 50px; }
	</style>
</head>
<body class="container">
	<div class="container" style="overflow: hidden;">
		<form id="frmFeedback" method="post">
			<div style="margin-top: 20px;">
				<span style="color: #ff0000">*</span> What is your email address? We need this to email you a certificate and information about badge pickup and the Mozilla backpack.
				<br />
				<input type="text" id="txtEmail" name="txtEmail" style="width: 500px;" />
			</div>
			<div>
				<span style="color: #ff0000">*</span> Which best describes you?
				<br />
				<input type="radio" name="rbDesc" value="Educator">Educator 
				<input type="radio" name="rbDesc" value="13-18">Student age 13-18 
				<input type="radio" name="rbDesc" value="Adult">Adult learner 
				<input type="radio" name="rbDesc" value="5-12">Student age 5-12
			</div>
			<div>
					Gender? 					
					<input type="radio" name="sex" value="male">Male 
					<input type="radio" name="sex" value="female">Female
			</div>
			<div style="clear: both;">
				Approximately how many minutes did the simulator take you to complete? 
				<input type="text" id="txtTime" name="txtTime" style="width: 30px;" maxlength="3" />
			</div>
			<div>
				Is this Lunar Rover Geometry astronaut candidate scenario a fair test of what you learned in the NASA Lunar Rover class activity? Why or why not?
				<br />
				<textarea rows="2" id="txtFairTest" name="txtFairTest" style="width: 500px; resize: none;"></textarea>
			</div>
			<div>
				What did you like best about this activity? Why?
				<br />
				<textarea rows="2" id="txtLikes" name="txtLikes" style="width: 500px; resize: none;"></textarea>
			</div>
			<div>
				What did you like least? Why?
				<br />
				<textarea rows="2" id="txtDislikes" name="txtDislikes" style="width: 500px; resize: none;"></textarea>
			</div>
			<div>
				What was the biggest challenge to you in doing the simulator activity?
				<br />
				<textarea rows="2" id="txtChallenge" name="txtChallenge" style="width: 500px; resize: none;"></textarea>
			</div>
			<div>
				Do you have any other suggestions to improve this Lunar Rover badge activity?
				<br />
				<textarea rows="2" id="txtSuggestions" name="txtSuggestions" style="width: 500px; resize: none;"></textarea>
			</div>
			<!--div>&nbsp;</div>
			<div>
				<a href="badge-it-gadget-lite/process-badges/" target="_blank">Click here to get your badge!</a>
			</div>
			<div>&nbsp;</div-->
			<div>
				<input type="button" id="btnSubmit" value="Submit Feedback" onclick="validate()" />
				<input type="button" id="btnCancel" value="Cancel" onclick="parent.Shadowbox.close();" />
				<span style="float: right; color: #ff0000;">* indicates required field</span>
			</div>
		</form>
	</div>
</body>
</html>