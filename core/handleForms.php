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

    $function = addPartner($pdo, $first_name, $last_name, $age, $gender, $birthdate, $home_address);
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
    $partner_id = $_GET['partner_id'];

    $function = updatePartner($pdo, $first_name, $last_name, $age, $gender, $birthdate, $home_address, $partner_id);
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
	$function = removePartner($pdo, $_GET['partner_id']);
	if($function) {
		header("Location: ../index.php");
	} else {
		echo "<h2>Partner removal failed.</h2>";
		echo '<a href="../index.php">';
        echo '<input type="submit" id="returnHomeButton" value="Return to home page" style="padding: 6px 8px; margin: 8px 2px;">';
		echo '</a>';
	}
}

if (isset($_POST['addFranchiseButton'])) {
    $business_name = trim($_POST['business_name']);
    $franchise_location = trim($_POST['franchise_location']);

    $function = addFranchise($pdo, $_GET['partner_id'], $business_name, $franchise_location);
    if($function) {
        header("Location: ../viewPartnerFranchises.php?partner_id=".$_GET['partner_id']);
    } else {
        echo "<h2>Franchise addition failed.</h2>";
		echo '<a href="../viewPartnerFranchises.php?partner_id=<?php .$_GET["partner_id"] ?>">';
        echo '<input type="submit" id="returnPartnerFranchisesButton" value="Return to partner page" style="padding: 6px 8px; margin: 8px 2px;">';
		echo '</a>';
    }
}

if (isset($_POST['editFranchiseButton'])) {
    $business_name = trim($_POST['business_name']);
    $franchise_location = trim($_POST['franchise_location']);

    $function = editFranchise($pdo, $business_name, $franchise_location, $_GET['franchise_id']);
    if($function) {
        header("Location: ../viewPartnerFranchises.php?partner_id=".$_GET['partner_id']);
    } else {
        echo "<h2>Franchise editing failed.</h2>";
		echo '<a href="../viewPartnerFranchises.php?partner_id=<?php .$_GET["partner_id"] ?>">';
        echo '<input type="submit" id="returnPartnerFranchisesButton" value="Return to partner page" style="padding: 6px 8px; margin: 8px 2px;">';
		echo '</a>';
    }
}

if (isset($_POST['removeFranchiseButton'])) {
    $function = removeFranchise($pdo, $_GET['franchise_id']);
    if($function) {
        header("Location: ../viewPartnerFranchises.php?partner_id=".$_GET['partner_id']);
    } else {
        echo "<h2>Franchise removal failed.</h2>";
		echo '<a href="../viewPartnerFranchises.php?partner_id=<?php .$_GET["partner_id"] ?>">';
        echo '<input type="submit" id="returnPartnerFranchisesButton" value="Return to partner page" style="padding: 6px 8px; margin: 8px 2px;">';
		echo '</a>';
    }
}
?>