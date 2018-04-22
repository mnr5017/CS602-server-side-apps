<?php 
	include '../view/header.php'; 
	require('../model/course_db.php');
	require('../model/database.php');
	require('../model/course.php');
?>

<main>
	<h1>Course List</h1>
	<section>
		<table>
			<tr>
				<th>ID</th>
				<th>Name</th>
			</tr>
			<?php $courses = CourseDB::getCourses(); ?>
			<?php foreach ($courses as $course) : ?>
			<tr>
				<td><?php echo $course->getCourseId(); ?></td>
				<td><?php echo $course->getCourseName(); ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</section>
	<p><h2>Add Course</h2></p>
	<form action="index.php" method="post" id="add_student_form">
		<input type="hidden" name="action" value="add_course" />

		<label>Course id:</label>
		<input type="text" name="course_id">
		<br>

		<label>Course Name:</label>
		<input type="text" name="course_name">
		<br>

		<label>&nbsp;</label>
		<input type="submit" value="Add Course">
		<br>
	</form>
</main>
<?php include '../view/footer.php'; ?>