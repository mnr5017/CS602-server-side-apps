<?php
class Student {
	private $course, $student_id, $first_name, $last_name, $email;

	public function __construct($course, $first_name, $last_name, $email) {
		$this->course = $course;
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->email = $email;
	}

	public function getCourse() {
		return $this->course;
	}

	public function setCourse($value) {
		$this->course = $value;
	}

	public function getStudentId() {
		return $this->student_id;
	}

	public function setStudentId($value) {
		$this->student_id = $value;
	}

	public function getFirstName() {
		return $this->first_name;
	}

	public function setFirstName($value) {
		$this->first_name = $value;
	}

	public function getLastName() {
		return $this->last_name;
	}

	public function setLastName($value) {
		$this->last_name = $value;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($value) {
		$this->email = $value;
	}
}
?>