<?php include '../view/header.php'; ?>
<main>
	<h1>Add Student</h1>
	<form action="index.php" method="post" id="add_student_form">
		<input type="hidden" name="action" value="add_student" />

		<label>Course:</label>
		<select name="course_id">
		<?php foreach ($courses as $course) : ?>
			<option value="<?php echo $course->getCourseId(); ?>">
				<?php echo $course->getCourseId(); ?>
			</option>
		<?php endforeach; ?>
		</select>
		<br>

		<label>First Name:</label>
		<input type="text" name="firstName">
		<br>

		<label>Last Name:</label>
		<input type="text" name="lastName">
		<br>

		<label>Email:</label>
		<input type="text" name="email">
		<br>

		<label>&nbsp;</label>
		<input type="submit" value="Add Student">
		<br>
	</form>
	<p><a href="index.php?action=list_students">View Student List</a></p>
</main>
<?php include '../view/footer.php'; ?>
