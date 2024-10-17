<?php
require_once 'dbConfig.php';

function addPartners($pdo, $first_name, $last_name, $age, $gender, $birthdate, $home_address) {
    $query = "INSERT INTO partners (first_name, last_name, age, gender, birthdate, home_address) VALUES (?, ?, ?, ?, ?, ?)";
    $statement = $pdo -> prepare($query);
	$executeQuery = $statement -> execute([$first_name, $last_name, $age, $gender, $birthdate, $home_address]);
    
    if ($executeQuery) {
		return true;	
	}
}

function getAllPartners($pdo) {
    $query = "SELECT * FROM partners";
	$statement = $pdo -> prepare($query);
	$executeQuery = $statement -> execute();
	
    if ($executeQuery) {
		return $statement->fetchAll();
	}
}

function getPartnerByID($pdo, $employee_id) {
	$query = "SELECT * FROM partners WHERE partner_id = ?";
	$statement = $pdo -> prepare($query);
	
    if ($statement -> execute([$employee_id])) {
		return $statement -> fetch();
	}
}

function updatePartner($pdo, $first_name, $last_name, $age, $gender, $birthdate, $home_address) {
	$query = "UPDATE partners
				SET first_name = ?,
                last_name = ?,
                age = ?,
                gender = ?,
                birthdate = ?,
                home_address = ?
			WHERE partner_id = ?";
	$statement = $pdo -> prepare($query);
	$executeQuery = $statement -> execute([$pdo, $first_name, $last_name, $age, $gender, $birthdate, $home_address]);
	
    if ($executeQuery) {
		return true;
	}
}

function removePartner($pdo, $partner_id) {
	$query = "DELETE FROM partners WHERE partner_id = ?";
	$statement = $pdo -> prepare($query);
	$executeQuery = $statement -> execute([$partner_id]);
	
    if ($executeQuery) {
		return true;
	}
}
?>