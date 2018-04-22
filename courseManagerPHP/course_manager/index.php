<?php
require('../model/database.php');
require('../model/course.php');
require('../model/course_db.php');
require('../model/student.php');
require('../model/student_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
	$action = filter_input(INPUT_GET, 'action');
	if($action == NULL) {
		$action = 'list_students';
	}
}

if ($action == 'list_students') {
	$course_id = filter_input(INPUT_GET, 'course_id');
	if ($course_id == NULL) {
		$course_id = 'cs601';
	}

	//get student and course data
	$current_class = CourseDB::getCourse($course_id);
	$courses = CourseDB::getCourses();
	$students = StudentDB::getStudentByCourse($course_id);

	//display the product list
	include('student_list.php');
} else if ($action == 'delete_student') {
	//get the student IDs
	$student_id = filter_input(INPUT_POST, 'student_id',
			FILTER_VALIDATE_INT);
	$course_id = filter_input(INPUT_POST, 'course_id');

	//delete the student from db
	StudentDB::deleteStudent($student_id);

	//display the student list page for the current class
	header("Location: .?course_id=$course_id");
} else if ($action == 'show_add_form') {
	$courses = CourseDB::getCourses();
	include('student_add.php');
} else if ($action == 'add_student') {
	$course_id = filter_input(INPUT_POST, 'course_id');
	$first_name = filter_input(INPUT_POST, 'firstName');
	$last_name = filter_input(INPUT_POST, 'lastName');
	$email = filter_input(INPUT_POST, 'email');
	if ($course_id == NULL || $course_id == FALSE || $first_name == NULL || $last_name == NULL || $email == NULL) {
		$error = "Invalid student data. Check all fields and try again.";
		include('../errors/error.php');
	} else {
	$current_class = CourseDB::getCourse($course_id);
	$student = new Student($current_class, $first_name, $last_name, $email);
	StudentDB::addStudent($student);

	//Display the list of students page for the current class
	header("Location: .?course_id=$course_id");
	include('resttry2.php');
	}
} else if ($action == 'add_course') {
	$course_id = filter_input(INPUT_POST, 'course_id');
	$course_name = filter_input(INPUT_POST, 'course_name');
	if ($course_id == NULL || $course_name == NULL) {
		$error = "Invalid course data. Check all fields and try again.";
		include('../errors/error.php');
	} else {

	$course = new Course($course_id, $course_name);
	CourseDB::addCourse($course);

	//Display the list of students page for the current class
	header("Location: course_list.php");
	//include('rest.php');
	}
}
?>