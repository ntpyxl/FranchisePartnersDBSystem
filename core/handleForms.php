<?php
require_once 'dbConfig.php';
require_once 'functions.php';

if(isset($_POST['addPartnerButton'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $home_address = trim($_POST['home_address']);

    $function = addPartners($pdo, $first_name, $last_name, $age, $gender, $birthdate, $home_address);
    if($function) {
        header("Location: ../index.php");
    } else {
        echo "<h2>Partner addition failed.</h2>";
        echo '<a href="../index.php">';
        echo '<input type="submit" id="returnHomeButton" value="Return to home page" style="padding: 6px 8px; margin: 8px 2px;">';
        echo '</a>';
    } 
}

if(isset($_POST['editPartnerButton'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $home_address = trim($_POST['home_address']);

    $function = updatePartner($pdo, $first_name, $last_name, $age, $gender, $birthdate, $home_address);
    if($function) {
        header("Location: ../index.php");
    } else {
        echo "<h2>Partner editing failed.</h2>";
        echo '<a href="../index.php">';
        echo '<input type="submit" id="returnHomeButton" value="Return to home page" style="padding: 6px 8px; margin: 8px 2px;">';
        echo '</a>';
    } 
}

if (isset($_POST['removePartnerButton'])) {
	$query = removePartner($pdo, $_GET['partner_id']);
	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "<h2>Partner removal failed.</h2>";
		echo '<a href="../index.php">';
        echo '<input type="submit" id="returnHomeButton" value="Return to home page" style="padding: 6px 8px; margin: 8px 2px;">';
		echo '</a>';
	}
}
?>