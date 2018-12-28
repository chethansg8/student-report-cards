<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/form.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/table.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/button.min.css">
<?php
global $wpdb;
if(isset($_POST["save"])){
	$wpdb->update( 
				'student_reports', 
				array( 
					'student_name' 		=> $_POST["student_name"], 
					'class_name' 		=> $_POST["class_name"],
					'section' 			=> $_POST["section"],
					'subject' 			=> $_POST["subject"],		
					'report_id' 		=> $_POST["report_id"],
					'working_days' 		=> $_POST["working_days"],
					'present_days' 		=> $_POST["present_days"],
					'start_page' 		=> $_POST["start_page"],
					'end_page' 			=> $_POST["end_page"],
					'marks_total' 		=> $_POST["marks_total"],
					'marks_got' 		=> $_POST["marks_got"]
					), 
				array( 'id' => $_POST["id"] )
			);
}
if(isset($_POST["delete"])){
	$id = $_POST["id"];
	$wpdb->delete( 'student_reports', array( 'id' => $id ) );
}

if(isset($_POST["edit"])){
	$id = $_POST["id"];
	$row = $wpdb->get_row( "
		SELECT * FROM student_reports WHERE id = $id",ARRAY_A );

	echo '<h1>Edit here</h1>
	<form action="" method="POST" id="edit_form">
		<input type="hidden" name="id" value="'.$id.'">
	<table class="ui striped table">
	<tr>
		<td>
		Student name</td>
	<td><input type="text" name="student_name" value="'.$row['student_name'].'">
		</td>
	</tr>
	<tr>
		<td>
		Class</td>
	<td><input type="text" name="class_name" value="'.$row['class_name'].'">
		</td>
	</tr>
	<tr>
		<td>
		Section</td>
	<td><input type="text" name="section" value="'.$row['section'].'">
		</td>
	</tr>
	<tr>
		<td>
		Subject</td>
	<td><input type="text" name="subject" value="'.$row['subject'].'">
		</td>
	</tr>
	<tr>
		<td>
		Report id </td>
	<td><input type="text" name="report_id" value="'.$row['report_id'].'">
		</td>
	</tr>
	<tr>
		<td>
		Working days</td>
	<td><input type="text" name="working_days" value="'.$row['working_days'].'">
		</td>
	</tr>
	<tr>
		<td>
		Present days</td>
	<td><input type="text" name="present_days" value="'.$row['present_days'].'">
		</td>
	</tr>
	<tr>
		<td>
		Start page</td>
	<td><input type="text" name="start_page" value="'.$row['start_page'].'">
		</td>
	</tr>
	<tr>
		<td>
		End page</td>
	<td><input type="text" name="end_page" value="'.$row['end_page'].'">
		</td>
	</tr>
	<tr>
		<td>
		Marks total </td>
	<td><input type="text" name="marks_total" value="'.$row['marks_total'].'">
		</td>
	</tr>
	<tr>
		<td>
		Marks got </td>
	<td><input type="text" name="marks_got" value="'.$row['marks_got'].'">
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" name="save" value="Save" class="ui green mini button">
		</td>
	</tr>
	</table>
	</form>';
	?>
<script type="text/javascript">
	var elements = document.querySelectorAll("#edit_form input[type=text]")

for (var i = 0, element; element = elements[i++];) {
    element.setAttribute("size" , 1.5*element.value.length);
    element.setAttribute("onClick", "this.select()");
}
</script>
<?php
}



$reports = $wpdb->get_results("SELECT * FROM student_reports");
?>
<h1>Report Card List</h1>
<form action="" method="POST">
	<table class="ui striped table">
		<thead>
		<tr>
			<th>Student</th>
			<th>Class</th>
			<th>Section</th>
			<th>Subject</th>
			<th>Working days</th>
			<th>Present days</th>
			<th>Start page</th>
			<th>End page</th>
			<th>Marks total</th>
			<th>Marks got</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>			
		</thead>
<?php
foreach ( $reports as $report ){
 	echo'<tr>
		<td> 	'.$report->student_name.' 		</td>
		<td>	'.$report->class_name.'			</td>
		<td>	'.$report->section.' 			</td>
		<td> 	'.$report->subject.' 	 		</td>
		<td> 	'.$report->working_days.' 		</td>
		<td>	'.$report->present_days.'		</td>
		<td> 	'.$report->start_page.' 		</td>
		<td>	'.$report->end_page.' 	 		</td>
		<td>	'.$report->marks_total.'		</td>
		<td>	'.$report->marks_got.' 			</td>
		<td>
			<form method="POST">
				<input type="hidden" name="id" value="'.$report->id.'">
				<input type="submit" name="edit" value="Edit" 
						class="ui blue mini button">
			</form>
		</td>
		<td>
			<form method="POST">
				<input type="hidden" name="id" value="'.$report->id.'">
				<input type="submit" name="delete" value="Delete" 
						class="ui red mini button">
			</form>
		</td>
		</tr>';
} 
?>

	</table>
</form>







