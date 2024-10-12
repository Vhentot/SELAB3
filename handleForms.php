<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertNewStudentBtn'])) {
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$yearLevel = trim($_POST['yearLevel']);
	$section = trim($_POST['section']);
	$adviser = trim($_POST['adviser']);
	$SpecialDish = trim($_POST['SpecialDish']);

	if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($yearLevel) && !empty($section)  && !empty($section)  && !empty($adviser) && !empty($SpecialDish)) {
			$query = insertIntoStudentRecords($pdo, $firstName, $lastName, 
			$gender, $yearLevel, $section, $adviser, $SpecialDish);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Insertion failed";
		}
	}

	else {
		echo "Make sure that no fields are empty";
	}
	
}


if (isset($_POST['editStudentBtn'])) {
	$student_id = $_GET['student_id'];
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$yearLevel = trim($_POST['yearLevel']);
	$section = trim($_POST['section']);
	$adviser = trim($_POST['adviser']);
	$SpecialDish = trim($_POST['SpecialDish']);

	if (!empty($student_id) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($yearLevel) && !empty($section) && !empty($adviser) && !empty($SpcialDish)) {

		$query = updateAStudent($pdo, $student_id, $firstName, $lastName, $gender, $yearLevel, $section, $adviser, $SpecialDish);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Update failed";
		}

	}

	else {
		echo "Make sure that no fields are empty";
	}

}





if (isset($_POST['deleteStudentBtn'])) {

	$query = deleteAStudent($pdo, $_GET['student_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}




?>