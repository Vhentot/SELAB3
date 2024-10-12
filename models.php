<?php 

require_once 'dbConfig.php';

function insertIntoStudentRecords($pdo,$first_name, $last_name, $gender, $yearLevel, $section, $adviser, $SpecialDish) {

	$sql = "INSERT INTO student_records (first_name,last_name,gender,year_level,section,adviser,SpecialDish) VALUES (?,?,?,?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, $yearLevel, 
		$section, $adviser, $SpecialDish]);

	if ($executeQuery) {
		return true;	
	}
}

function seeAllStudentRecords($pdo) {
	$sql = "SELECT * FROM student_records";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getStudentByID($pdo, $student_id) {
	$sql = "SELECT * FROM student_records WHERE student_id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$student_id])) {
		return $stmt->fetch();
	}
}

function updateAStudent($pdo, $student_id, $first_name, $last_name, 
	$gender, $year_level, $section, $adviser, $SpecialDish) {

	$sql = "UPDATE student_records 
				SET first_name = ?, 
					last_name = ?, 
					gender = ?, 
					year_level = ?, 
					section = ?, 
					adviser = ?, 
					SpecialDish = ? 
			WHERE student_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, 
		$year_level, $section, $adviser, $SpecialDish, $student_id]);

	if ($executeQuery) {
		return true;
	}
}



function deleteAStudent($pdo, $student_id) {

	$sql = "DELETE FROM student_records WHERE student_id = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$student_id]);

	if ($executeQuery) {
		return true;
	}

}




?>