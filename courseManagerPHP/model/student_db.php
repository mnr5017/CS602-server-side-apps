<?php
	class StudentDB {
		public static function getStudentByCourse($course_id) {
			$db = Database::getDB();

			$course = CourseDB::getCourse($course_id);

			$query = 'SELECT * FROM sk_students
					  WHERE courseID = :course_id
					  ORDER BY studentID';
			$statement = $db->prepare($query);
			$statement->bindValue(":course_id", $course_id, PDO::PARAM_STR);
			$statement->execute();
			$rows = $statement->fetchAll();
			$statement->closeCursor();

			$students = array();
			foreach ($rows as $row) {
				$student = new Student($course,
									   $row['firstName'],
									   $row['lastName'],
									   $row['email']);
				$student->setStudentId($row['studentID']);
				$students[] = $student;
			}
			return $students;
		}

		public static function getStudent($student_id) {
			$db = Database::getDB();
			$query = 'SELECT * FROM sk_students
					  WHERE studentID = :student_id';
			$statement = $db->prepare($query);
			$statement->bindValue(':student_id', $student_id);
			$statement->execute();
			$row = $statement->fetch();
			$statement->closeCursor();

			$course = CourseDB::getCourse($row['courseID']);
			$student = new Student($course_id,
								   $row['firstName'],
								   $row['lastName'],
								   $row['email']);
			$student->setStudentId($row['studentID']);
			return $student;
		}

		public static function deleteStudent($student_id) {
			$db = Database::getDB();
			$query = 'DELETE FROM sk_students
					  WHERE studentID = :student_id';
			$statement = $db->prepare($query);
			$statement->bindValue(':student_id', $student_id);
			$statement->execute();
			$statement->closeCursor();	
		}

		public static function addStudent($student) {
			$db = Database::getDB();

			$course_id = $student->getCourse()->getCourseId();
			$first_name = $student->getFirstName();
			$last_name = $student->getLastName();
			$email = $student->getEmail();

			$query = 'INSERT INTO sk_students
						(courseID, firstName, lastName, email)
						VALUES
						(:course_id, :first_name, :last_name, :email)';
			$statement = $db->prepare($query);
			$statement->bindValue(':course_id', $course_id);
			$statement->bindValue(':first_name', $first_name);
			$statement->bindValue(':last_name', $last_name);
			$statement->bindValue(':email', $email);
			$statement->execute();
			$statement->closeCursor();
		}
	}
?>