<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/form.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/table.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/button.min.css">
<h1>Add new card:</h1>
<?php
if(isset($_POST["add"])){
global $wpdb;
$wpdb->insert( 
	'student_reports', 
	array( 
		'student_name' 	=> $_POST["student_name"],
		'class_name' 	=> $_POST["class_name"],
		'section' 		=> $_POST["section"],
		'subject' 		=> $_POST["subject"],	
		'report_id' 	=> $_POST["report_id"],
		'working_days' 	=> $_POST["working_days"],
		'present_days' 	=> $_POST["present_days"],
		'start_page' 	=> $_POST["start_page"],
		'end_page' 		=> $_POST["end_page"],
		'marks_total' 	=> $_POST["marks_total"],
		'marks_got' 	=> $_POST["marks_got"] 
		)
		);
$wpdb->show_errors();
$wpdb->print_error();
}
?>

<form action="" method="POST">
<table class="ui striped table">
	<tr>
		<td>Student Name</td>
		<td><input type="text" name="student_name"></td>
	</tr>
	<tr>
		<td>Class</td>
		<td><input type="text" name="class_name"></td>
	</tr>
	<tr>
		<td>Section</td>
		<td><input type="text" name="section"></td>
	</tr>
	<tr>
		<td>Subject</td>
		<td><input type="text" name="subject"></td>
	</tr>
	<tr>
		<td>Report id</td>
		<td><input type="text" name="report_id"></td>
	</tr>
	<tr>
		<td>Working days</td>
		<td><input type="text" name="working_days"></td>
	</tr>
	<tr>
		<td>Present days</td>
		<td><input type="text" name="present_days"></td>
	</tr>
	<tr>
		<td>Start page</td>
		<td><input type="text" name="start_page"></td>
	</tr>
	<tr>
		<td>End page</td>
		<td><input type="text" name="end_page"></td>
	</tr>
	<tr>
		<td>Marks total</td>
		<td><input type="text" name="marks_total"></td>
	</tr>
	<tr>
		<td>Marks got</td>
		<td><input type="text" name="marks_got"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="add" value="Submit" class="ui blue mini button"></td>
	</tr>
</table>
</form>