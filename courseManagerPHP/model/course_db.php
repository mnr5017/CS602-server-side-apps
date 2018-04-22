<?php
	class CourseDB {
		public static function getCourses() {
			$db = Database::getDB();
			$query = 'SELECT * FROM sk_courses
					  ORDER BY courseID';
			$statement = $db->prepare($query);
			$statement->execute();

			$courses = array();
			foreach ($statement as $row) {
				$course = new Course($row['courseID'],
									$row['courseName']);
				$courses[] = $course;
			}
			return $courses;
		}

		public static function getCourse($course_id) {
			$db = Database::getDB();
			$query = 'SELECT * FROM sk_courses
						WHERE courseID = :course_id';
			$statement = $db->prepare($query);
			$statement->bindValue(':course_id', $course_id);
			$statement->execute();
			$row = $statement->fetch();
			$statement->closeCursor();
			$course = new Course($row['courseID'],
								 $row['courseName']);
			return $course;
		}

		public static function addCourse($course) {
			$db = Database::getDB();

			$course_id = $course->getCourseId();
			$course_name = $course->getCourseName();

			$query = 'INSERT INTO sk_courses
						(courseID, courseName)
						VALUES
						(:course_id, :course_name)';
			$statement = $db->prepare($query);
			$statement->bindValue(':course_id', $course_id);
			$statement->bindValue(':course_name', $course_name);
			$statement->execute();
			$statement->closeCursor();
		}
	}
?>