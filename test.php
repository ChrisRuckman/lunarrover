<?php
/**
 * @author andrew harrison <andrew@cet.edu>
 * @copyright (c) 2012 the Center for Educational Technologies
 * @version 3.02
 */
$action = $_POST['action'];
/**
 * grade testing
 * this pulls the post data for the "calculations" portion of the sim.
 */
if($action == 'grade') {
	$AB2=$_POST['txtAB2'];
	$AB3=$_POST['txtAB3'];
	$AC1=$_POST['txtAC1'];
	$AC2=$_POST['txtAC2'];
	$AC3=$_POST['txtAC3'];
	$AD1=$_POST['txtAD1'];
	$AD2=$_POST['txtAD2'];
	$AD3=$_POST['txtAD3'];
	$AE1=$_POST['txtAE1'];
	$AE2=$_POST['txtAE2'];
	$AE3=$_POST['txtAE3'];
	$AF1=$_POST['txtAF1'];
	$AF2=$_POST['txtAF2'];
	$AF3=$_POST['txtAF3'];
	$BC1=$_POST['txtBC1'];
	$BC2=$_POST['txtBC2'];
	$BC3=$_POST['txtBC3'];
	$BF2=$_POST['txtBF2'];
	$BF3=$_POST['txtBF3'];
	$CD2=$_POST['txtCD2'];
	$CD3=$_POST['txtCD3'];
	$CE2=$_POST['txtCE2'];
	$CE3=$_POST['txtCE3'];
	$CF1=$_POST['txtCF1'];
	$CF2=$_POST['txtCF2'];
	$CF3=$_POST['txtCF3'];
	$DE1=$_POST['txtDE1'];
	$DE2=$_POST['txtDE2'];
	$DE3=$_POST['txtDE3'];
	$DF1=$_POST['txtDF1'];
	$DF2=$_POST['txtDF2'];
	$DF3=$_POST['txtDF3'];
	$EF1=$_POST['txtEF1'];
	$EF2=$_POST['txtEF2'];
	$EF3=$_POST['txtEF3'];
	$results = array();

	$results['AB2'] = ($AB2 == 0.08) ? 'true' : 'false';
	$results['AB3'] = ($AB3 == 0.10) ? 'true' : 'false';
	$results['AC1'] = ($AC1 == 12.00) ? 'true' : 'false';
	$results['AC2'] = ($AC2 == 0.48) ? 'true' : 'false';
	$results['AC3'] = ($AC3 == 0.60) ? 'true' : 'false';
	$results['AD1'] = ($AD1 == 14.00) ? 'true' : 'false';
	$results['AD2'] = ($AD2 == 0.56) ? 'true' : 'false';
	$results['AD3'] = ($AD3 == 0.70) ? 'true' : 'false';
	$results['AE1'] = ($AE1 == 12.12) ? 'true' : 'false';
	$results['AE2'] = ($AE2 == 0.48) ? 'true' : 'false';
	$results['AE3'] = ($AE3 == 0.61) ? 'true' : 'false';
	$results['AF1'] = ($AF1 == 10.20) ? 'true' : 'false';
	$results['AF2'] = ($AF2 == 0.41) ? 'true' : 'false';
	$results['AF3'] = ($AF3 == 0.51) ? 'true' : 'false';
	$results['BC1'] = ($BC1 == 10.00) ? 'true' : 'false';
	$results['BC2'] = ($BC2 == 0.40) ? 'true' : 'false';
	$results['BC3'] = ($BC3 == 0.50) ? 'true' : 'false';
	$results['BF2'] = ($BF2 == 0.40) ? 'true' : 'false';
	$results['BF3'] = ($BF3 == 0.50) ? 'true' : 'false';
	$results['CD2'] = ($CD2 == 0.08) ? 'true' : 'false';
	$results['CD3'] = ($CD3 == 0.10) ? 'true' : 'false';
	$results['CE2'] = ($CE2 == 0.07) ? 'true' : 'false';
	$results['CE3'] = ($CE3 == 0.09) ? 'true' : 'false';
	$results['CF1'] = ($CF1 == 14.14) ? 'true' : 'false';
	$results['CF2'] = ($CF2 == 0.57) ? 'true' : 'false';
	$results['CF3'] = ($CF3 == 0.71) ? 'true' : 'false';
	$results['DE1'] = ($DE1 == 2.62) ? 'true' : 'false';
	$results['DE2'] = ($DE2 == 0.10) ? 'true' : 'false';
	$results['DE3'] = ($DE3 == 0.13) ? 'true' : 'false';
	$results['DF1'] = ($DF1 == 15.62) ? 'true' : 'false';
	$results['DF2'] = ($DF2 == 0.62) ? 'true' : 'false';
	$results['DF3'] = ($DF3 == 0.78) ? 'true' : 'false';
	$results['EF1'] = ($EF1 == 13.00) ? 'true' : 'false';
	$results['EF2'] = ($EF2 == 0.52) ? 'true' : 'false';
	$results['EF3'] = ($EF3 == 0.65) ? 'true' : 'false';
	$results['msg'] = "<p><h3>Success!</h3>All answers are correct!</p>";
	$results['status'] = 'pass';
	foreach ($results as $key => $value) {
		if($value == 'false') {
			$results['msg'] = '<div class="incorrect"><h3>Sorry</h3><p>Please check the errors highlighted in red in your calculations above.</p></div>';
			$results['status'] = 'fail';
		}
	}
	die(json_encode($results));
/**
 * rates test
 * this pulls the posted values for the "rates" portion of the sim.
 */
} else if($action == "rate") {
	$em=$_POST['txtRateEm'];
	$ld=$_POST['txtRateLd'];
	$msg = '<span class="incorrect"><h3>Incorrect!</h3></span>';
	if($em == 25 && $ld == 20) {
		$msg = '<h3>Correct!</h3>';
	}
	die($msg);
/**
 * rover path test
 * checks if the given path is the shortest/fastest.
 */
} else if($action == "test") {
	$path=$_POST['path'];
	$msg = '<span class="incorrect"><h3>Incorrect!</h3><p>We regret to inform you that you\'ve made a serious error. We encourage you to learn more math and apply again next year (simulator time). No badge will be issued.</p><br class="clear"/><p>Consider revisiting the <a href="http://www.nasa.gov/pdf/514487main_AL_ST_Lunar%20Rover_FINAL.pdf" target="_blank">NASA Lunar Rover activity.</a></p></span>';
	if($path == 'd') {
		$msg = 'correct';
	}
	die($msg);
/**
 * error handling
 * returns an error for unknown requests.
 */
} else {
	$err = array('msg' => '<div class="incorrect"><h3>Error!</h3><p>Sorry, we were unable to connect to the server.</p></div>');
	die(json_encode($err));
}

?>