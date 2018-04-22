<?php include '../view/header.php'; ?>
<main>
	<h1>Student List</h1>
	<aside>
		<!-- display list of students -->
		<h2>Courses</h2>
		<nav>
		<ul>
		<?php foreach ($courses as $course) : ?>
			<li>
				<a href="?course_id=<?php echo $course->getCourseId(); ?>">
					<?php echo $course->getCourseId(); ?>
				</a>
			</li>
		<?php endforeach; ?>
		</ul>
		</nav>
	</aside>
	<section>
		<!-- display table of students -->
		<h2><?php echo $current_class->getCourseName(); ?></h2>
		<table>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th class = "email">Email</th>
				<th>&nbsp;</th>
			</tr>
			<?php foreach ($students as $student) : ?>
			<tr>
				<td><?php echo $student->getFirstName(); ?></td>
				<td><?php echo $student->getLastName(); ?></td>
				<td class="right"><?php echo $student->getEmail(); ?>
				</td>
				<td><form action="." method="post"
						id="delete_student_form">
					<input type="hidden" name="action"
						value="delete_student">
					<input type="hidden" name="student_id"
						value="<?php echo $student->getStudentId(); ?>">
					<input type="hidden" name="course_id"
							value="<?php echo $current_class->getCourseId(); ?>">
					<input type="submit" value="Delete">
				</form></td>
			</tr>
		<?php endforeach; ?>
		</table>
		<p><a href="?action=show_add_form">Add Student</a></p>
		<p><a href="course_list.php">List Courses</a></p>
	</section>
</main>
<?php include '../view/footer.php'; ?>