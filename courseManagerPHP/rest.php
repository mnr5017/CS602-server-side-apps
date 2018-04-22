<?php 
require('../model/database.php');
require('../model/course.php');
require('../model/course_db.php');
require('../model/student.php');
require('../model/student_db.php');


//get students and course id
if($_GET['action'] == 'students') {
	$course_id = $_GET['course'];

	//get student info from db
	$students = StudentDB::getStudentByCourse($course_id);

	//using xml format
	if($_GET['format'] == 'xml') {

		// Create new DOMDocument object (PHP feature) and set options
		$doc = new DOMDocument('1.0');
		$doc->preserveWhiteSpace = false;
		$doc->formatOutput = true;

		$root = $doc->createElement('students');
		$root = $doc->appendChild($root);

		foreach($students as $student) {
			$i = $doc->createElement('student');
			$root->appendChild($i);
			$firstName = $doc->createElement('firstName', $student->getFirstName());
			$i->appendChild($firstName);
			$lastName = $doc->createElement('lastName', $student->getLastName());
			$i->appendChild($lastName);
			$email = $doc->createElement('email', $student->getEmail());
			$i->appendChild($email);
		}
		
		header('Content-type: text/xml');
		echo $doc->saveXML();

		//json format	
	} else if ($_GET['format'] == 'json') {
		$studentsJson = array();

		foreach($students as $student){
			$studentJson = new stdClass();

			$studentJson->firstName = $student->getFirstName();
			$studentJson->lastName = $student->getLastName();
			$studentJson->email = $student->getEmail();
			$studentsJson[] = $studentJson;
		}

		header('Content-type: application/json');
		echo json_encode($studentsJson);
	}
	//get all courses
} else if ($_GET['action'] == 'courses') {

	//get courses from db
	$courses = CourseDB::getCourses();

	//xml format
	if($_GET['format'] == 'xml') {
		$doc = new DOMDocument('1.0');
		$doc->preserveWhiteSpace = false;
		$doc->formatOutput = true;

		$root = $doc->createElement('courses');
		$root = $doc->appendChild($root);

		foreach($courses as $course) {
			$i = $doc->createElement('course');
			$root->appendChild($i);
			$courseId = $doc->createElement('courseId', $course->getCourseId());
			$i->appendChild($courseId);
			$courseName = $doc->createElement('courseName', $course->getCourseName());
			$i->appendChild($courseName);
		}
		
		header('Content-type: text/xml');
		echo $doc->saveXML();

		//json format
	} else if ($_GET['format'] == 'json') {
		$coursesJson = array();

		foreach($courses as $course){
			$courseJson = new stdClass();

			$courseJson->firstName = $course->getCourseId();
			$courseJson->lastName = $course->getCourseName();
			$coursesJson[] = $courseJson;
		}

		header('Content-type: application/json');
		echo json_encode($coursesJson);
	}
}
//this code generates the xml document as needed compared to class examples
?>

