<?php
require_once 'dbConfig.php';

function getAllPartners($pdo) {
    $query = "SELECT * FROM partners";
	$statement = $pdo -> prepare($query);
	$executeQuery = $statement -> execute();
	
    if ($executeQuery) {
		return $statement->fetchAll();
	}
}

function getPartnerByID($pdo, $partner_id) {
	$query = "SELECT * FROM partners WHERE partner_id = ?";
	$statement = $pdo -> prepare($query);
	
    if ($statement -> execute([$partner_id])) {
		return $statement -> fetch();
	}
}

function addPartner($pdo, $first_name, $last_name, $age, $gender, $birthdate, $home_address) {
    $query = "INSERT INTO partners (first_name, last_name, age, gender, birthdate, home_address) VALUES (?, ?, ?, ?, ?, ?)";
    $statement = $pdo -> prepare($query);
	$executeQuery = $statement -> execute([$first_name, $last_name, $age, $gender, $birthdate, $home_address]);
    
    if ($executeQuery) {
		return true;	
	}
}

function updatePartner($pdo, $first_name, $last_name, $age, $gender, $birthdate, $home_address, $partner_id) {
	$query = "UPDATE partners
				SET first_name = ?,
                last_name = ?,
                age = ?,
                gender = ?,
                birthdate = ?,
                home_address = ?
			WHERE partner_id = ?";
	$statement = $pdo -> prepare($query);
	$executeQuery = $statement -> execute([$first_name, $last_name, $age, $gender, $birthdate, $home_address, $partner_id]);
	
    if ($executeQuery) {
		return true;
	}
}

function removePartner($pdo, $partner_id) {
	$query1 = "DELETE FROM franchises WHERE owner_id = ?";
	$statement1 = $pdo -> prepare($query1);
	$executeQuery1 = $statement1 -> execute([$partner_id]);

	if($executeQuery1) {
		$query2 = "DELETE FROM partners WHERE partner_id = ?";
		$statement2 = $pdo -> prepare($query2);
		$executeQuery2 = $statement2 -> execute([$partner_id]);
		
		if ($executeQuery2) {
			return true;
		}
	}
}

function getFranchiseByID($pdo, $franchise_id) {
	$query = "SELECT
				franchise_id,
				business_name,
				franchise_location,
				date_franchised
			FROM franchises
			WHERE franchise_id = ?
			GROUP BY franchise_id;";
		$statement = $pdo -> prepare($query);
		$executeQuery = $statement -> execute([$franchise_id]);
		
		if ($executeQuery) {
			return $statement -> fetch();
		}
}

function getFranchisesByPartnerID($pdo, $partner_id) {
	$query = "SELECT
				franchises.franchise_id,
				franchises.business_name,
				franchises.franchise_location,
				franchises.date_franchised
			FROM franchises
			JOIN partners ON franchises.owner_id = partners.partner_id
			WHERE partners.partner_id = ?;";
		$statement = $pdo -> prepare($query);
		$executeQuery = $statement -> execute([$partner_id]);
		
		if ($executeQuery) {
			return $statement -> fetchAll();
		}
}

function addFranchise($pdo, $partner_id, $business_name, $franchise_location) {
	$query = "INSERT INTO franchises (owner_id, business_name, franchise_location) VALUES (?, ?, ?)";
    $statement = $pdo -> prepare($query);
	$executeQuery = $statement -> execute([$partner_id, $business_name, $franchise_location]);
    
    if ($executeQuery) {
		return true;	
	}
}

function editFranchise($pdo, $business_name, $franchise_location, $franchise_id) {
	$query = "UPDATE franchises
				SET business_name = ?,
					franchise_location = ?
				WHERE franchise_id = ?";
    $statement = $pdo -> prepare($query);
	$executeQuery = $statement -> execute([$business_name, $franchise_location, $franchise_id]);
    
    if ($executeQuery) {
		return true;	
	}
}

function removeFranchise($pdo, $franchise_id) {
	$query = "DELETE FROM franchises WHERE franchise_id = ?";
	$statement = $pdo -> prepare($query);
	$executeQuery = $statement -> execute([$franchise_id]);

	if ($executeQuery) {
	return true;	
	}
}
?>