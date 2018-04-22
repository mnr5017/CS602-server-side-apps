<?php
class Course {
	private $course_id, $course_name;

	public function __construct($course_id, $course_name) {
		$this->course_id = $course_id;
		$this->course_name = $course_name;
	}

	public function getCourseId() {
		return $this->course_id;
	}

	public function setCourseId($value) {
		$this->course_id = $value;
	}

	public function getCourseName() {
		 return $this->course_name;
	}

	public function setCourseName($value) {
		$this->course_name = $value;
	}
	
}
?>